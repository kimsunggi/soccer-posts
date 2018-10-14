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
    
    <ul class="media-list">
    @foreach ($charts as $chart)
        <?php $user = $chart->user; ?>
        
        @if (Auth::user()->is_voting($chart->id))
        <li class="panel panel-primary">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            </div>
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $chart->created_at }}</span>
                </div>
                
                <!-- アンケート中身-->
                
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
            </div>
            <div>    
                <img src="http://chart.apis.google.com/chart?chs=400x200&chd=t:{{$count_choice1->get($chart->id,0)}},{{$count_choice2->get($chart->id,0)}},{{$count_choice3->get($chart->id,0)}},{{$count_choice4->get($chart->id,0)}},{{$count_choice5->get($chart->id,0)}},{{$count_choice6->get($chart->id,0)}},{{$count_choice7->get($chart->id,0)}},{{$count_choice8->get($chart->id,0)}}&cht=p&chl={{$chart->choice1}}|{{$chart->choice2}}|{{$chart->choice3}}|{{$chart->choice4}}|{{$chart->choice5}}|{{$chart->choice6}}|{{$chart->choice7}}|{{$chart->choice8}}&chco=0000ff,ff0000,00ff00,00ffff">
                
            </div>
        @endif
    @endforeach
    </li>
    </div>
@endsection