<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class WelcomeController extends Controller
{
    
    public function index()
    {
        
        $articles = Article::where('area', '海外')
        ->paginate(10);
        
        
        return view('welcome', [
            'articles' => $articles]
            );
    }
    
    public function domestic()
    {
        $articles = Article::where('area', '国内')
        ->paginate(10);
        
        
        return view('domestic', [
            'articles' => $articles]
            );
    }
}