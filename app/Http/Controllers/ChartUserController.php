<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Chart;

class ChartUserController extends Controller
{
    
    public function vote(Request $request, $id)
    {
        
        
        $choice = $request->choice;//nameの値(choice)からvalueの値を受け取れる。
        $chartId = $id;
        
        \Auth::user()->vote($chartId,$choice);
        
        return redirect()->back(
            );
    }



    
}
