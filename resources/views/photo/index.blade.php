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
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">


  </head>
  <body>
    <div class="container">
            <div class="dropzone" id="dropzoneFileUpload">
              <div class="grid js-masonry"
                data-masonry-options='{ "itemSelector": ".grid-item", "columnWidth": 300 }'>
                @foreach($photos as $photo)
                <div class="grid-item"><img src="{{url('uploads/thumbnail',$photo->img_name)}}"></div>
                @endforeach
              </div>
              {!! $photos->render() !!}
            </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
    <script src="{{ asset('/js/jquery.infinitescroll.js') }}"></script>
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
        <script>

        (function(){

            var grid = document.querySelector('.grid');
            var msnry = new Masonry( grid, {
            // options...
            itemSelector: '.grid-item',
            columnWidth: 300,
            gutterWidth: 20,
            });

            var loading_options = {
                finishedMsg: "<div class='end-msg'>Congratulations! You've reached the end of the internet</div>",
                msgText: "<div class='center'>Loading news items...</div>",
                img: "/images/ajax-loader.gif"
            };
            $('div.grid').infinitescroll({
              loading : loading_options,
              navSelector : "div.container .pagination",
              nextSelector : "div.container .pagination li.active + li a",
              itemSelector : "div.grid div.grid-item"
            });
          	// $container.imagesLoaded(function(){
          	// 	$container.masonry({
          	// 		itemSelector: '.grid-item',
          	// 		isFitWidth: true,
          	// 		isAnimated: true,
          	// 		isResizable: true
          	// 	});
          	// });
          	// $container.infinitescroll({
          	// 	navSelector  : 'div.container .pagination',
          	// 	nextSelector : 'div.container .pagination li.active + li a',
          	// 	itemSelector : 'div.grid div.grid-item',
          	// 	animate:true,
          	// 	extraScrollPx: -200,
          	// 	loading: {
          	// 		finishedMsg: '終わりです！',
          	// 		img: '/images/ajax-loader.gif'
          	// 	}
          	// },
          	// function( newElements ) {
          	// 	var $newElems = $( newElements );
          	// 	// $newElems.imagesLoaded(function(){
          	// 	// 	$container.masonry( 'appended', $newElems, true );
          	// 	// });
          	// });

        })();


        </script>
  </body>
</html>
