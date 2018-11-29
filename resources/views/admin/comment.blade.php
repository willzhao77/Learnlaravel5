@extends('layouts.app')

@section('content')
<h4>
    <a href="http://localhost/learnlaravel5/public/admin/"><< Admin Home </a>
</h4>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">



                <div class="panel-heading">评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif


                    @foreach ($comments as $comment)
                        <hr>
                        <div class="article">
                            <h4>{{ $comment->nickname }}</h4>
                            <div class="content">
                                <p>
                                    {{ $comment->content }}
                                </p>
                            </div>
                            @foreach ($articles as $article)

                              @if ($article->id == $comment->article_id)
                                {{ $article->title }}
                              @endif
                            @endforeach

                        </div>



                        <a href="{{ url('admin/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                    @endforeach






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
