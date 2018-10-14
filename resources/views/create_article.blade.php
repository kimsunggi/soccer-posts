@extends('layouts.app')

@section('content')


@if (Auth::check())
        {!! Form::open(['route' => 'article.store']) !!}
            <div class="form-group">
                
                <div class="form-group">
                    <lavel><input name="area" type="radio" value="海外" checked="checked">海外</lavel><br />
                    <lavel><input name="area" type="radio" value="国内">国内</lavel>
                </div>
                <div class="form-group">
                    {!! form::label('title', 'title') !!}
                    {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('content', '見出し') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('url', 'url') !!}
                    {!! Form::textarea('url', old('url'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('img_src', 'img_src') !!}
                    {!! Form::textarea('img_src', old('img_src'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                
                
                  
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        {!! Form::close() !!}
    @endif



@endsection