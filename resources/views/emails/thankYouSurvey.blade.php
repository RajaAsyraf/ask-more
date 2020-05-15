<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="text-center m-2">
        <img src="{{ asset('images/askmore_logo.png') }}" alt="askmore logo" height="40px">
        <h3>Thank You!</h3>
        <p>Hi {{ $survey->name }},</p>
        <p>We've received your survey. Thank you for taking the time to complete this survey.</p>
        Best regards,
        <p>Askmore Team</p>
    </div>
</body>
</html>

