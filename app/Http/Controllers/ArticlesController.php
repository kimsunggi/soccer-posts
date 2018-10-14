<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;
use App\Comment;

class ArticlesController extends Controller
{
    public function create(){
        return view('create_article');
    }
    
    public function store(Request $request){
        
        $article = new Article;
        
        $article->area = $request->area;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->url = $request->url;
        $article->img_src = $request->img_src;
        
        $article->save();
        
        return redirect('/');
    }
    
    public function destroy($id){
        
        $article = Article::find($id);

        $article->delete();
        return redirect()->back();
    }
    
    public function show($id){
        $article = Article::find($id);
        
        //コメント
        $comments = Comment::where('article_id', '=', $id)->paginate(10);
        
        
        return view('show_article', [
            'article' => $article,
            'comments' => $comments
            ]);
    }
    
}
