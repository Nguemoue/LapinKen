<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <div class="d-flex">
        @includeIf("admin._partials.sidebar")
        <div class="overflow-auto">
            @yield("main")
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>

</html>
