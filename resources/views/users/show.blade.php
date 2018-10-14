@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
    <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="{{ route('users.show', Auth::id()) }}">コメントした記事</a></li>
                <li><a href="{{ route('users.index', Auth::id()) }}">投票したアンケート</a></li>
            </ul>
    
    
    <ul style="list-style-type: none">
    @foreach ($articles as $article)
    @if (Auth::user()->is_commenting($article->id))
        <?php $user = $article->user; ?>
        
        
    
        <li>
            <div style="float-left" style="display: inline;">
                <div>
                    <span>posted at {{ $article->created_at }}</span>
                </div>
                <div>
                    <a href="{{ route('article.show', $article->id) }}"><img  style="width:50%;" src="{{$article->img_src}}"></a>
                    <h3 style="width:50%;"><a href="{{ route('article.show', $article->id) }}">{!! nl2br(e($article->title)) !!}</a></h3>
                </div>
                
            </div>
        
        </li>
    @endif
    @endforeach
    </ul>
    
    </div>
@endsection