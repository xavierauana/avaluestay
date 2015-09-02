<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A Value Stay</title>
    <link rel="stylesheet" href="{{elixir ("css/app.css")}}">
    @yield('stylesheets')
</head>
<body>

{{--@include("front.layouts.partials.header")--}}
@include("back.layouts.partials.header")

<!-- end of header section -->
<div class="container">

    @yield("content")

</div>

@include("front.layouts.partials.footer")
<!-- end footer section -->

@if(!Auth::user())
    @include("front.layouts.partials.signUpForm")
@endif

@include('jsvariables')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/front.js"></script>

@yield('scripts')

</body>
</html>