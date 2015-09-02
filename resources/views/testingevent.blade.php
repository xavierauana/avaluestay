@extends('back.layouts.default')

@section('content')
    <p id="power">0</p>
@stop

@section('scripts')

    <script src="{{ asset('/js/socket.io.js') }}"></script>

    <script>
        var socket = io('http://avaluestay.dev:3000');
        socket.on("test-channel:avaluestay\\Events\\TestingEvent", function(message){
            // increase the power everytime we load test route
            console.log(message);
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>


@stop