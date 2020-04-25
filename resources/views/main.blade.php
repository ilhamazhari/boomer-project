<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-client_id" content="13145964747-emea760qj9c1o3cvbf3p7devomrer5fr.apps.googleusercontent.com">

        <title>Boomercam</title>

        <!-- Styles -->
        <link href="{{ mix('/css/app.scss') }}" rel="stylesheet">

        <!-- Script -->
        <script src="{{ mix('/js/app.js') }}" defer></script>
        
    </head>
    <body>
        @inertia

        <!-- Script -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </body>
</html>