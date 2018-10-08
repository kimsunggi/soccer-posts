@extends('layouts.app')

@section('content')


@if (Auth::check())
        {!! Form::open(['route' => 'charts.store']) !!}
            <div class="form-group">
                
                <div class="form-group">
                    {!! form::label('question', 'お題') !!}
                    {!! Form::textarea('question', old('question'), ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice1', '選択肢１') !!}
                    {!! Form::textarea('choice1', old('choice1'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice2', '選択肢２') !!}
                    {!! Form::textarea('choice2', old('choice2'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice3', '選択肢３') !!}
                    {!! Form::textarea('choice3', old('choice3'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice4', '選択肢４') !!}
                    {!! Form::textarea('choice4', old('choice4'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choide5', '選択肢５') !!}
                    {!! Form::textarea('choice5', old('choice5'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice6', '選択肢６') !!}
                    {!! Form::textarea('choice6', old('choice6'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice7', '選択肢７') !!}
                    {!! Form::textarea('choice7', old('choice7'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('choice8', '選択肢８') !!}
                    {!! Form::textarea('choice8', old('choice8'), ['class' => 'form-control', 'rows' => '1']) !!}
                </div>
                
                  
                {!! Form::submit('作成する', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        {!! Form::close() !!}
    @endif



@endsection