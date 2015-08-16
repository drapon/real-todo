@extends('article.master')

@section('content')
    <h2 class="page-header"><a href="/">記事編集</a></h2>
    <form name="form1" action="/articles/update/{{ $article->id }}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label>タイトル</label>
            <input type="text" name="title" value="{{ $article->title }}" required="required" class="form-control" />

        </div>
        <div class="form-group">
            <label>本文</label>
            <textarea name="body" required="required" class="form-control">{{ $article->body }}</textarea>

        </div>
        <button type="submit" class="btn btn-default">編集</button>
    </form>
@endsection

@section('footer')

@endsection
