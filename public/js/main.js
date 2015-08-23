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

function keypress($searchbox){
  var me = this;
  this.$oj = $searchbox;//keyupイベントを設定するtextbox
  this.keyup_stack = [];//keyup時にpush、setTimeout時にpopを行うスタック

  this.bindShowCand = function(){
    me.$oj.keyup(function(){
      me.keyup_stack.push(1);
      setTimeout((function(me_){
        return function(){
          me_.keyup_stack.pop();
          //以下が重要、スタックが空になったらサーバーへ問い合わせ実行
          if(me_.keyup_stack.length == 0){
            me_.showCandidate();
          }
        };
      })(me),1000);
    });
  };
  this.showCandidate = function(){
    var url = $(this).attr("data-link");

    $.ajax({
      url : 'draft',
      type: 'POST',
      // beforeSend: function (xhr) {
      //      var token = $('meta[name="csrf_token"]').attr('content');
      //      console.log()
      //      if (token) {
      //            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
      //      }
      //  },
      data: { testdata : 'testdatacontent' },
      dataType: 'JSON',
      success : function(data){
          console.log(data);
        }
    });
  };

  me.bindShowCand();
}
var hoge = new keypress($('textarea'));

var baseUrl = "{{ url('/') }}";
            var token = "{{ Session::getToken() }}";
            Dropzone.autoDiscover = false;
             var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                 url: baseUrl+"/dropzone/uploadFiles",
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
