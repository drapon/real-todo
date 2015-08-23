<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Photos</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">


    <link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">


  </head>
  <body>
    <div class="container">
            <div class="dropzone" id="dropzoneFileUpload">
            </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/dropzone.js') }}"></script>
    <script type="text/javascript">
            var baseUrl = "{{ url('/photos') }}";
            var token = "{{ Session::getToken() }}";
            Dropzone.autoDiscover = false;
             var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                 url: baseUrl+"/uploadFiles",
                 params: {
                    _token: token
                  }
             });
             Dropzone.options.myAwesomeDropzone = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                addRemoveLinks: true,
                accept: function(file, done) {

                },
              };
         </script>
         <script src="//cdn.socket.io/socket.io-1.3.4.js"></script>
         <script>
            //var socket = io('http://localhost:3000');
            var socket = io('http://192.168.10.10:3000');
            socket.on("test-channel:App\\Events\\PhotoCreated", function(message){
                // increase the power everytime we load test route
                // $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
                // $('#id').text(parseInt($('#id').text()) + parseInt(message.data.id));
                console.log(message.data.id);
                console.log(message.data.img_name);
            });
        </script>
  </body>
</html>
