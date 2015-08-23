@extends('article.master')

@section('content')
    <h2 class="page-header"><a href="/">記事投稿</a></h2>
    <form name="form1" action="/articles/store" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label>タイトル</label>
            <input type="text" name="title" value="" required="required" class="form-control" />

        </div>
        <div class="form-group">
            <div class="dropzone" id="dropzoneFileUpload">
              uploadfile
            </div>
        </div>
        <div class="form-group">
            <label>本文</label>
            <textarea name="body" required="required" class="form-control"></textarea>

        </div>
        <button type="submit" class="btn btn-default">投稿</button>
    </form>
@endsection

@section('footer')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdn.socket.io/socket.io-1.3.4.js"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
<script src="/js/main.js"></script>
@endsection
