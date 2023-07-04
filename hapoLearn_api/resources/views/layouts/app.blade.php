<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HapoLearn</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&family=Open+Sans:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="body-cus">
    <div class="viewport">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        @yield('messenger')
        @include('layouts.login')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script-socket')
</body>

</html>
