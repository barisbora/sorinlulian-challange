<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barış BORA</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="flex-center">
    <div id="app">
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
