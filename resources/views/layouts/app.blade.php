<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('stylesheets')
    <title>Chat application @if(isset($title)) | {{ $title }} @endif</title>
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>
</head>
<body class="@if(isset($centered) && $centered) center @endif shroom-gradient">
@include('layouts.inc.nav')
<div id="app">
    <main class="content">
        @yield('body')
    </main>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('javascripts')
</body>
</html>
