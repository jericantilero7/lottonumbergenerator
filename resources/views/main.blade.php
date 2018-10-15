<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lotto Number Generator</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>

<body>

    @include('parts.navigation')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('contents')
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</html>