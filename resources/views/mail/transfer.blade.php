<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 12px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
<div>
    <p>Hi,</p>
    <p>Transfer Info: </p>
    <p>ID : {{$info ? $info->id : ''}}</p>
    <p>Payer NO : {{$info ? $info->payer_no : ''}}</p>
    <p>Payee NO : {{$info ? $info->payee_no : ''}}</p>
    <p>Price : {{$info ? $info->price : ''}}</p>

    <p class="signature">Mailtrap</p>
</div>
</body>
</html>