@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>soccer posts</h1>
                @if (Auth::check())
                @else
                    <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">あなたの声を届ける</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
<p>国内ニュース</p>
<div >
    <ul style="list-style-type: none">
    @foreach ($articles as $article)
    <li>
        <div style="float-left" style="display: inline;">
            <div>
                <span>posted at {{ $article->created_at }}</span>
            </div>
            <div>
                <a href="{{ route('article.show', $article->id) }}"><img  style="width:50%;" src="{{$article->img_src}}"></a>
                <h3 style="width:50%;"><a href="{{ route('article.show', $article->id) }}">{!! nl2br(e($article->title)) !!}</a></h3>
            </div>
            @if (\Auth::id() === 1)
            {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger ']) !!}
            {!! Form::close() !!}
            @endif
        </div>
        
    </li>
    
    
    @endforeach
</div>
{!! $articles->render() !!}
@endsection