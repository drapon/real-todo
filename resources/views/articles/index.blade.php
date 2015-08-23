@extends('article.master')

@section('content')
    <h2 class="page-header">記事一覧</h2>
    <div>
        <a href="/articles/create" class="btn btn-primary">投稿</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td id="title">{{{ $article->title }}}</td>
                <td id="body">{{{ $article->body }}}</td>
                <td>{{{ $article->created_at }}}</td>
                <td>{{{ $article->updated_at }}}</td>
                <td>
                    <a href="/articles/show/{{{ $article->id }}}" class="btn btn-default btn-xs">詳細</a>
                    <a href="/articles/edit/{{{ $article->id }}}" class="btn btn-success btn-xs">編集</a>
                    <a href="/articles/destroy/{{{ $article->id }}}" class="btn btn-danger btn-xs">削除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

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
        $('#title').append(message.data.title);
        $('#body').append(message.data.body);
    });
</script>
@endsection
