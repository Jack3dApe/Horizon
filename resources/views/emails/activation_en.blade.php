<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #f4f4f4; margin: 0; padding: 0; font-family: 'Lato', Helvetica, Arial, sans-serif;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" bgcolor="#0b0c2a">
            <table border="0" cellpadding="0" cellspacing="0" width="600" style="max-width: 600px; padding: 0 40px;">
                <tr>
                    <td align="center" style="padding: 40px 20px;">
                        <img src="{{ asset('imgs/logo_horizon_text2.png') }}" width="300" alt="Logo" style="display: block; max-width: 100%; height: auto;">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF" style="padding: 40px 20px;">
            <p style="font-size: 16px; color: #666666; margin-bottom: 20px;">Please click the button below to activate your email:</p>
            <a href="{{ $link }}" style="background-color: #e53637; color: #ffffff; padding: 15px 25px; text-decoration: none; font-size: 16px; border-radius: 5px; display: inline-block; margin: 20px 0;">Activate Email</a>
            <p style="margin-top: 10px; font-size: 14px; color: #666666;">Or click this link: <a href="{{ $link }}" style="color: #0b0c2a;">{{ $link }}</a></p>
            <p style="font-size: 14px; color: #666666; margin-top: 20px;">If you did not request this action, please ignore this email.</p>
        </td>
    </tr>
    <tr>
        <td align="center" bgcolor="#6a0dad" style="padding: 20px;">
            <p style="font-size: 14px; color: #ffffff; margin: 0;">Copyright {{ date('Y') }} © All rights reserved | Horizon</p>
        </td>
    </tr>
</table>
</body>
</html>

