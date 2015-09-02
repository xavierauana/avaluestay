<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A Value Stay</title>
    <link rel="stylesheet" href="{{elixir ("css/app.css")}}">
    @yield('stylesheets')
</head>
<body>

@include("back.layouts.partials.header")

        <!-- end of header section -->
<div class="container content-container">

    @yield("content")

</div>

@include("back.layouts.partials.footer")
<!-- end footer section -->

@include('jsvariables')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{elixir ("js/back.js")}}"></script>



@yield("scripts")
</body>
</html>