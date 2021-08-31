<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    Dear {{ $mail_data['name'] }},<br/>

    Mail message to the user<br/>

    The content of the message should be here <br/>
    code: {{ $mail_data['token'] }}<br/>

    Thank you,<br/>
    Regards samuel
</body>
</html>