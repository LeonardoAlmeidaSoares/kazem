<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("img/favicons/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("img/favicons/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("img/favicons/favicon-16x16.png") }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/favicons/favicon.ico") }}">
    <link rel="manifest" href="{{asset("img/favicons/manifest.json") }}">
    <meta name="msapplication-TileImage" content="{{asset("img/favicons/mstile-150x150.png") }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset("js/config.js") }}"></script>
    <script src="{{asset("vendors/overlayscrollbars/OverlayScrollbars.min.js") }}"></script>
    @livewireStyles

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    <link href="{{asset("css/sheet.css") }}" rel="stylesheet" id="user-style-default">
  </head>

  <body>
    @yield('content')
    
    @livewireScripts
  </body>
</html>