<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Chart;
use App\Article;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $articles = Article::paginate(10);

            $data = [
                'user' => $user,
                'articles' => $articles,
            ];

        return view('users.show', $data);
    }
    
    
    public function index($id) 
    {
        $user = User::find($id);
        $charts = Chart::paginate(10);
            
            $count_choice1 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',1)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice2 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',2)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice3 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',3)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice4 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',4)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice5 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',5)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice6 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',6)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice7 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',7)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            $count_choice8 = \DB::table('chart_user')
            ->select(\DB::raw('count(choice) as choice_count, chart_id'))
            ->where('choice',8)
            ->groupBy('chart_id')
            ->pluck('choice_count', 'chart_id');
            
           

            $data = [
                'user' => $user,
                'charts' => $charts,
                'count_choice1' => $count_choice1,
                'count_choice2' => $count_choice2,
                'count_choice3' => $count_choice3,
                'count_choice4' => $count_choice4,
                'count_choice5' => $count_choice5,
                'count_choice6' => $count_choice6,
                'count_choice7' => $count_choice7,
                'count_choice8' => $count_choice8
            ];

        return view('users.index', $data);
    }
}
