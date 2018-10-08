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

<div class="col-xs-8">
    @if (Auth::check())
    <div>
        <a href="{{ route('charts.create') }}" class="btn btn-primary btn-block">アンケートを作成する</a>
    </div>
    @endif
    
    @if (count($charts) > 0)
    <ul class="media-list">
    @foreach ($charts as $chart)
        <?php $user = $chart->user; ?>
        <li class="media">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            </div>
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $chart->created_at }}</span>
                </div>
                
                <!-- アンケート中身-->
                
                @if (Auth::check())
                    @if (Auth::user()->is_voting($chart->id))
                        <div>
                            <h3>{!! nl2br(e($chart->question)) !!}</h3>
                            <ul>
                                @for ($i = 1; $i <= 8; $i++)
                                    @if ($chart->{'choice'.$i})
                                      <li>{!! nl2br(e($chart->{'choice'.$i})) !!}</li>
                                    @endif
                                @endfor  
                            </ul>
                        </div>
                        <p>投票済</p>
                        
                        
                        
                    @else
                            {!! Form::open(['route' => ['chart_user.want',$chart->id]]) !!}
                            <div>
                                <h3>{!! nl2br(e($chart->question)) !!}</h3>
                                
                                <fieldset>
                                    <label><input type="radio" name="choice" value="1" checked="checked">{!! nl2br(e($chart->choice1)) !!}</label>
                                    @for ($i = 2; $i <= 8; $i++)
                                        @if ($chart->{'choice'.$i})
                                          <label><input type="radio" name="choice" value="{{ $i }}">{!! nl2br(e($chart->{'choice'.$i})) !!}</label>
                                        @endif
                                    @endfor  
                                </fieldset>
                            </div>
                            {!! Form::submit('投票', ['class' => 'btn btn-primary btn-block']) !!}
                            {!! Form::close() !!}
                    @endif
                @else
                    <div>
                        <h3>{!! nl2br(e($chart->question)) !!}</h3>
                        <ul>
                            @for ($i = 1; $i <= 8; $i++)
                                @if ($chart->{'choice'.$i})
                                  <li>{!! nl2br(e($chart->{'choice'.$i})) !!}</li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <a href="{{ route('signup.get') }}" class="btn btn-primary btn-block">ログインして投票</a>
                @endif
                
                <div>
                @if (Auth::id() == $chart->user_id)
                    {!! Form::open(['route' => ['charts.destroy', $chart->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
            <!-- googlechart-->
            <div>    
            
                
                <img src="http://chart.apis.google.com/chart?chs=400x200&chd=t:{{$count_choice1->get($chart->id,0)}},{{$count_choice2->get($chart->id,0)}},{{$count_choice3->get($chart->id,0)}},{{$count_choice4->get($chart->id,0)}},{{$count_choice5->get($chart->id,0)}},{{$count_choice6->get($chart->id,0)}},{{$count_choice7->get($chart->id,0)}},{{$count_choice8->get($chart->id,0)}}&cht=p&chl={{$chart->choice1}}|{{$chart->choice2}}|{{$chart->choice3}}|{{$chart->choice4}}|{{$chart->choice5}}|{{$chart->choice6}}|{{$chart->choice7}}|{{$chart->choice8}}&chco=0000ff,ff0000,00ff00,00ffff">
                
                
                
            </div>
                
        </li>
    @endforeach
    </ul>
    @endif
    
</div>
{!! $charts->render() !!}

@endsection