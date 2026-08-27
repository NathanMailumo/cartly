<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
</head>
<body style="margin: 0; padding: 0; background-color: #0f172a; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #f8fafc;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #0f172a; padding: 40px 10px;">
        <tr>
            <td align="center">
                <!-- Outer Card -->
                <table role="presentation" width="100%" style="max-width: 480px; background-color: #1e293b; border-radius: 12px; border: 1px solid #334155; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3); overflow: hidden;">
                    
                    <!-- Header -->
                    <tr>
                        <td style="padding: 32px 32px 16px 32px; text-align: center;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: 700; color: #38bdf8; letter-spacing: -0.5px;">Cartly</h1>
                        </td>
                    </tr>

                    <!-- Body Content -->
                    <tr>
                        <td style="padding: 0 32px 24px 32px; text-align: center;">
                            <h2 style="margin: 0 0 12px 0; font-size: 20px; font-weight: 600; color: #f8fafc;">Verify Your Email</h2>
                            <p style="margin: 0 0 24px 0; font-size: 14px; line-height: 1.6; color: #94a3b8;">
                                Use the verification code below to complete your password reset. This code will expire in <strong>10 minutes</strong>.
                            </p>

                            <!-- OTP Code Display Box -->
                            <div style="background-color: #0f172a; border: 1px dashed #475569; border-radius: 8px; padding: 18px; margin: 0 auto; display: inline-block; width: 100%; box-sizing: border-box;">
                                <span style="font-family: 'Courier New', Courier, monospace; font-size: 32px; font-weight: 700; letter-spacing: 8px; color: #38bdf8; text-indent: 8px; display: inline-block;">
                                    {{ $code }}
                                </span>
                            </div>
                        </td>
                    </tr>

                    <!-- Notice / Footer -->
                    <tr>
                        <td style="padding: 0 32px 32px 32px; text-align: center;">
                            <p style="margin: 0; font-size: 12px; line-height: 1.5; color: #64748b;">
                                If you did not request a password reset, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>