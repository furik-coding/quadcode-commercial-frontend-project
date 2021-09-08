<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quadcode block preview</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/media/styles/styles.min.css">

    <script src="{{ asset('media/js/app.js') }}"></script>
    @yield('head')

</head>
<body>

    @yield('content')

</body>
</html>
