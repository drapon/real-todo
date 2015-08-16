@extends('article.master')

@section('content')
    <h2 class="page-header"><a href="/">記事詳細</a></h2>
    <ul class="list-inline">
        <li>
            <a href="/articles/edit/{{{ $article->id }}}" class="btn btn-primary pull-left">編集</a>
        </li>
        <li>
            <a href="/articles/destroy/{{{ $article->id }}}" class="btn btn-danger pull-left">削除</a>
        </li>
    </ul>
    <table class="table table-striped">
        <tbody>
        <tr>
            <th>タイトル</th>
            <td>{{{ $article->title }}}</td>
        </tr>
        <tr>
            <th>本文</th>
            <td>{{{ $article->body }}}</td>
        </tr>
        <tr>
            <th>作成日時</th>
            <td>{{{ $article->created_at }}}</td>
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{{ $article->updated_at }}}</td>
        </tr>
        </tbody>
    </table>
@endsection

@section('footer')

@endsection
