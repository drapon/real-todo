@extends('article.master')

@section('content')
    <h1></h1>
    <p><strong id="title"></strong><span class="body"></div></p>
@stop

@section('footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://192.168.10.10:3000');
        socket.on("test-channel:App\\Events\\ArticleCreated", function(message){
            // increase the power everytime we load test route
            // $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
            // $('#id').text(parseInt($('#id').text()) + parseInt(message.data.id));
            console.log(message.data.id);
            console.log(message.data.title);
            console.log(message.data.body);
            $('h1').append(message.data.id);
            $('#title').append(message.data.title);
            $('.body').append(message.data.body);
        });
    </script>
@stop
