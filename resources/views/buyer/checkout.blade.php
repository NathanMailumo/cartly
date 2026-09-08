<x-layout>
	<x-slot:title>Easybuy · Checkout</x-slot:title>

	<div class="w-full max-w-6xl mx-auto px-4 sm:px-6 py-8">
		<div class="flex items-center justify-between border-b border-[#231f1d] pb-4 mb-8">
			<div>
				<p class="font-editorial-sans text-[10px] uppercase tracking-[0.2em] text-[#787167]">Checkout</p>
				<h1 class="font-masthead text-4xl text-[#161413]">Complete your order</h1>
			</div>
			<a href="{{ route('buyer.cart') }}" class="font-editorial-sans text-xs uppercase tracking-[0.14em] text-[#5e5953] hover:text-[#161413] transition">
				<i class="fa-solid fa-arrow-left mr-1"></i> Cart
			</a>
		</div>

		@if($errors->any())
			<div class="mb-6 border border-[#9b2c2c] bg-[#f8e9e6] p-4 text-[#7f1d1d]" role="alert">
				<div class="flex items-start gap-3">
					<i class="fa-solid fa-circle-exclamation mt-0.5"></i>
					<div>
						<p class="font-editorial-sans text-xs uppercase tracking-[0.12em] font-bold">Checkout could not continue</p>
						<ul class="mt-2 space-y-1 font-serif-body text-sm">
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endif

		@if($cartItems->isEmpty())
			<div class="border border-[#231f1d] bg-[#faf8f4] p-10 text-center">
				<i class="fa-solid fa-cart-shopping text-2xl text-[#787167] mb-3"></i>
				<p class="font-serif-body text-lg text-[#5e5953]">Your cart is empty.</p>
				<a href="{{ route('buyer.browse') }}" class="inline-flex mt-5 px-5 py-3 bg-[#161413] text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.16em]">Browse products</a>
			</div>
		@else
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
				<form id="checkout-form" method="POST" action="{{route('payment.initialize')}}" class="lg:col-span-7 space-y-6">
					@csrf
					<section class="border border-[#cfc8bc] bg-[#faf8f4] p-5 sm:p-7">
						<div class="flex items-center gap-3 border-b border-[#dcd7ce] pb-4 mb-5">
							<i class="fa-solid fa-location-dot text-[#161413]"></i>
							<h2 class="font-masthead text-2xl text-[#161413]">Delivery details</h2>
						</div>
						<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
							<div>
								<label for="first_name" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">First name</label>
								<input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"  autocomplete="given-name" placeholder="First name" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div>
								<label for="last_name" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">Last name</label>
								<input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"  autocomplete="family-name" placeholder="Last name" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div class="sm:col-span-2">
								<label for="shipping_address" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">Delivery address</label>
								<textarea id="shipping_address" name="shipping_address" rows="3"  autocomplete="street-address" placeholder="House number, street, area" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">{{ old('shipping_address', Auth::user()->buyer->shipping_address ?? '') }}</textarea>
							</div>
							<div>
								<label for="phone_number" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">Mobile number</label>
								<input id="phone_number" type="tel" name="phone_number" value="{{ old('phone_number', Auth::user()->buyer->phone_number ?? '') }}"  autocomplete="tel" placeholder="0800 000 0000" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div>
								<label for="delivery_city" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">City</label>
								<input id="delivery_city" type="text" name="delivery_city" value="{{ old('delivery_city') }}"  autocomplete="address-level2" placeholder="Lagos" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div>
								<label for="delivery_state" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">State</label>
								<input id="delivery_state" type="text" name="delivery_state" value="{{ old('delivery_state') }}"  autocomplete="address-level1" placeholder="Lagos State" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div>
								<label for="zip_code" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">Postcode</label>
								<input id="zip_code" type="text" name="zip_code" value="{{ old('zip_code') }}"  autocomplete="postal-code" placeholder="100001" class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] placeholder-[#a39c91] focus:outline-none focus:border-[#161413]">
							</div>
							<div class="sm:col-span-2">
								<label for="country" class="block text-xs font-editorial-sans uppercase tracking-[0.12em] text-[#4a453e] mb-1">Country</label>
								<select id="country" name="country"  class="w-full bg-[#f4efe6] border border-[#cfc8bc] px-3.5 py-2.5 text-sm font-serif-body text-[#161413] focus:outline-none focus:border-[#161413]">
									<option value="Nigeria" selected>Nigeria</option>
								</select>
							</div>
						</div>
					</section>

					<section class="border border-[#cfc8bc] bg-[#faf8f4] p-5 sm:p-7">
						<div class="flex items-center gap-3 border-b border-[#dcd7ce] pb-4 mb-5">
							<i class="fa-solid fa-credit-card text-[#161413]"></i>
							<h2 class="font-masthead text-2xl text-[#161413]">Payment method</h2>
						</div>
						<div class="space-y-3" id="payment-options">
							<label class="payment-option flex items-start gap-3 border border-[#161413] bg-[#f4efe6] p-4 cursor-pointer">
								<input type="radio" name="payment_method" value="paystack" checked class="mt-1 accent-[#161413]">
								<span><strong class="block font-editorial-sans text-sm uppercase tracking-[0.1em] text-[#161413]"><i class="fa-solid fa-credit-card mr-2"></i>Paystack</strong><span class="block font-serif-body text-sm text-[#5e5953] mt-1">Pay securely with card, bank transfer, or USSD.</span></span>
							</label>
							<label class="payment-option flex items-start gap-3 border border-[#cfc8bc] bg-white p-4 cursor-pointer hover:border-[#161413] transition">
								<input type="radio" name="payment_method" value="bank_transfer" class="mt-1 accent-[#161413]">
								<span><strong class="block font-editorial-sans text-sm uppercase tracking-[0.1em] text-[#161413]"><i class="fa-solid fa-building-columns mr-2"></i>Bank transfer</strong><span class="block font-serif-body text-sm text-[#5e5953] mt-1">Receive payment instructions after placing your order.</span></span>
							</label>
							<label class="payment-option flex items-start gap-3 border border-[#cfc8bc] bg-white p-4 cursor-pointer hover:border-[#161413] transition">
								<input type="radio" name="payment_method" value="cash_on_delivery" class="mt-1 accent-[#161413]">
								<span><strong class="block font-editorial-sans text-sm uppercase tracking-[0.1em] text-[#161413]"><i class="fa-solid fa-money-bill-wave mr-2"></i>Cash on delivery</strong><span class="block font-serif-body text-sm text-[#5e5953] mt-1">Pay when your order arrives, where available.</span></span>
							</label>
						</div>
						<p id="payment-note" class="mt-4 text-xs font-serif-body italic text-[#787167]"><i class="fa-solid fa-lock mr-1"></i> You will be taken to secure payment after confirming your details.</p>
					</section>

				</form>

				<aside class="lg:col-span-5 h-fit border-2 border-[#231f1d] bg-[#faf8f4] p-5 sm:p-7">
					<h2 class="font-editorial-sans text-sm uppercase tracking-[0.18em] text-[#161413] border-b border-[#231f1d] pb-4">Order summary</h2>
					<div class="divide-y divide-[#e5dfd5]">
						@foreach($cartItems as $item)
							<div class="py-4 flex justify-between gap-4 font-serif-body">
								<span class="text-[#3d3833]">{{ $item->products->productname }} <small class="text-[#787167]">× {{ $item->quantity }}</small></span>
								<span class="font-semibold text-[#161413]">₦{{ number_format(($item->products->productprice ?? 0) * $item->quantity) }}</span>
							</div>
						@endforeach
					</div>
					<div class="border-t-2 border-[#231f1d] pt-4 mt-2 flex justify-between font-serif-body text-xl font-bold text-[#161413]"><span>Total</span><span>₦{{ number_format($total) }}</span></div>
					<button id="checkout-submit" form="checkout-form" type="submit" class="w-full mt-6 py-3.5 bg-[#1a1918] hover:bg-black text-[#f7f4ee] font-editorial-sans text-xs uppercase tracking-[0.18em] transition flex items-center justify-center gap-2"><span>Proceed to Payment</span><i class="fa-solid fa-arrow-right text-[9px]"></i></button>
				</aside>
			</div>
		@endif
	</div>

	<script>
		document.querySelectorAll('input[name="payment_method"]').forEach(function (option) {
			option.addEventListener('change', function () {
				const submit = document.getElementById('checkout-submit');
				const note = document.getElementById('payment-note');
				const isCash = this.value === 'cash_on_delivery';

				submit.querySelector('span').textContent = isCash ? 'Place Order' : 'Proceed to Payment';
				note.innerHTML = isCash
					? '<i class="fa-solid fa-truck mr-1"></i> Pay cash when your order is delivered.'
					: '<i class="fa-solid fa-lock mr-1"></i> You will be taken to secure payment after confirming your details.';
			});
		});
	</script>
</x-layout>
