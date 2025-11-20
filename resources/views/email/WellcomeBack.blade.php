<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Notification</title>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" border="1">
                    <tr>
                        <td>
                            <h2>Login Notification</h2>
                            <p>Hello {{ $user->name }}</p>
                            <p>We noticed a new login to your account.</p>
                            
                            <p><strong>Login Details:</strong></p>
                            <p>Email: {{ $user->email }}</p>
                            
                            <p>If this was you, you can safely ignore this email.</p>

                            <p>Best regards,<br>PMS Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>