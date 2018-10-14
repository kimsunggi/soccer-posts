@extends('layouts.app')

@section('content')
<div>
    <span>posted at {{ $article->created_at }}</span>
</div>
<div>
    <a href="{{$article->url}}"><img  style="width:50%;" src="{{$article->img_src}}"></a>
    <h3 style="width:70%;">{!! nl2br(e($article->title)) !!}</h3>
    <p style="width:70%;">{!! nl2br(e($article->content)) !!}</p>
    <a href="{{$article->url}}" class="btn btn-primary btn-block">記事へ</a>
</div>


<div class="col-xs-8">
    @if (Auth::check())
    {!! Form::open(['route' => ['comment.store', $article->id]]) !!}
    <div class="form-group">
        <div class="form-group">
            {!! form::label('comment', 'コメント') !!}
            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '3']) !!}
        </div>
    
    {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
    {!! Form::close() !!}
    @endif

    <ul class="media-list">
    @foreach ($comments as $comment)
        <?php $user = $comment->user; ?>
        <li class="panel panel-primary">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            </div>
            <div class="media-body">
                <div>
                    <span>{{$user->name}}</span> <span class="text-muted">posted at {{ $comment->created_at }}</span>
                </div>
                
                <div>
                    <h3>{!! nl2br(e($comment->comment)) !!}</h3>
                </div>
               
                <div>
                @if (Auth::id() == $comment->user_id)
                    {!! Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger ']) !!}
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endsection