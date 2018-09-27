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
    テスト
@endsection