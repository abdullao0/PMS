<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Confirmation</title>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" border="1">
                    <tr>
                        <td>
                            <h2>Welcome to PMS!</h2>
                            <p>Hello {{ $user->name }}</p>
                            <p>Thank you for registering with us. Your account has been successfully created.</p>
                            
                            <p><strong>Your Account Details:</strong></p>
                            <p>Email: {{ $user->email }}</p>
                            <p>Registration Date: {{ $user->created_at }}</p>
                            
                            <p>If you did not create this account, please ignore this email.</p>
                            
                            <p>Best regards,<br>PMS Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html