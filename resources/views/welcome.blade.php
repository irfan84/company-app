<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Companies Database</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" type="text/javascript" defer></script>
    <meta name="csrf-token" value="{{ csrf_token() }}" />
</head>
<body>
<div id="app">

</div>
</body>
</html>
