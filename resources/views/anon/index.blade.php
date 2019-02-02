@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>匿名BBS</h3>
    @foreach ($comments as $comment)
      <div class="card col-md-7">
        <div class="card-body">
          <p>ID: {{ $comment->id }}</p>
          <p>名前: {{ $comment->user_name }}</p>
          <pre>{{ $comment->body }}</pre>
          <small>投稿日：{{ $comment->created_at }}</small>
        </div>
      </div>
    @endforeach
    <div class="card-body">
      <form action="/anon/create" method="post">
        <div class="form-group row">
          <label for="user_name" class="col-md-1 col-form-label text-md-right">ユーザ名</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="user_name" value=""/>
          </div>
        </div>
        <div class="form-group row">
          <label for="body" class="col-md-1 col-form-label text-md-right">内容</label>
          <div class="col-md-6">
            <textarea class="form-control" name="body"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6 offset-4">
            <input class="btn btn-success" type="submit" value="送信"/>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection