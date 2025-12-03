<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations</title>

   @vite('resources/css/app.css')

</head>
<body class="text-center px-8 py-12">  
    <h1>Informations</h1>
    <p>This is the welcome page of the application.</p>

    <a href="/Info" class="btn mt-4 inline-block ">
        Click to get more info
    </a>

</body>
</html>