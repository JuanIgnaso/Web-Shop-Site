<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$subject}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/images/web-logo.png','resources/css/fontawesome/css/all.css'])

</head>
<body @style(
    'background-color: #eef2ff',
    'padding: 1%'
)>
    <h1
    @style(
      'text-align: center'
    )>{{$subject}}</h1>
    <p @style(
        'text-align: center'
      )>{{$body}}</p>
    <a @style(
        'text-align: center'
      ) href="https://google.com">Enlace</a>
</body>
</html>
