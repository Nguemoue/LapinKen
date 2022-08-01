<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    @stack("styles")
    <title>Lapin Ken Administration</title>
</head>

<body>
    <div class="d-flex">
        @includeIf("admin._partials.sidebar")
        <div class="overflow-auto w-100 h-full " style="overflow-y: auto;max-height: 100vh">
            @yield("main")
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
@stack("scripts")
</html>
