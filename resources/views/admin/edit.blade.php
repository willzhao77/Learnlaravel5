@extends('layouts.app')

@section('content')

@Section('content')
<form action="{{ url('admin/comments/'.$comment->id) }}" method="POST">
    {{ method_field('PATCH') }}
    {!! csrf_field() !!}

    <h4>
        <a href="http://localhost/learnlaravel5/public/admin/comments"><<评论管理</a>
    </h4>

    <div class="form-group">
        <label>Nickname</label>
        <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required" value="{{ $comment->nickname }}">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" style="width: 300px;" value="{{ $comment->email }}">
    </div>
    <div class="form-group">
        <label>Home page</label>
        <input type="text" name="website" class="form-control" style="width: 300px;" value="{{ $comment->website }}">
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required">{{ $comment->content }}</textarea>
    </div>
    <input type="hidden" name="article_id" class="form-control" style="width: 300px;" value="{{ $comment->article_id }}">
    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
</form>
@endsection
