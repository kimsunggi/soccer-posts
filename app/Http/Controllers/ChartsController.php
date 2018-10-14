<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Chart;

class ChartsController extends Controller
{
    public function index()
    {
            
            $user = new User();
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
            $data += $this->counts($user);
            return view('charts', $data);
        
    }
    
    public function create()
    {
        return view('cerate_chart');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|max:191',
            'choice1' => 'required|max:30',
            'choice2' => 'required|max:30',
            'choice3' => 'max:30',
            'choice4' => 'max:30',
            'choice5' => 'max:30',
            'choice6' => 'max:30',
            'choice7' => 'max:30',
            'choice8' => 'max:30',
        ]);

        $request->user()->charts()->create([
            'question' => $request->question,
            'choice1' => $request->choice1,
            'choice2' => $request->choice2,
            'choice3' => $request->choice3,
            'choice4' => $request->choice4,
            'choice5' => $request->choice5,
            'choice6' => $request->choice6,
            'choice7' => $request->choice7,
            'choice8' => $request->choice8,
        ]);

        return redirect()->route('chart.get');
    }
    
    public function destroy($id)
    {
        $chart = \App\Chart::find($id);

        if (\Auth::id() === $chart->user_id) {
            
            \DB::delete("DELETE FROM chart_user WHERE chart_id = ?", [$id]);
            $chart->delete();
        }
        
        return redirect()->back();
    }
}
