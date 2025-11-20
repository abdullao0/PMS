<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Message Received</title>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" border="1">
                    <tr>
                        <td>
                            <h2>Thank You for Contacting Us!</h2>
                            <p>Hello {{ $data['name'] }}</p>
                            <p>We have successfully received your message and our team will review it shortly.</p>
                            
                            <p><strong>Your Message Details:</strong></p>
                            <p>Name: {{ $data['name'] }}</p>
                            <p>Email: {{ $data['email'] }}</p>
                            <p>Subject: {{ $data['subject'] }}</p>
                            <p>Message: {{ $data['message'] }}</p>
                                                        
                            <p>If you need immediate assistance, please call us at [0599433494].</p>
                            
                            <p>Best regards,<br>PMS Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>