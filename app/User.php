<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //アンケート投稿
    public function charts()
    {
        return $this->hasMany(Chart::class);
    }
    
    
    //投票
    public function choices()
    {
        return $this->belongsToMany(Chart::class, 'chart_user', 'user_id', 'chart_id')->withPivot('choice')->withTimestamps();
    }
    public function vote($chartId,$value)
    {
        // 既に vote しているかの確認
        $exist = $this->is_voting($chartId);

        if ($exist) {
            return false;
        } else {
            $this->choices()->attach($chartId, ['choice' => $value]);
            return true;
        }
    }
    public function is_voting($chartId) {
    return $this->choices()->where('chart_id', $chartId)->exists();
    }
    
    //コメント
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'comments', 'user_id', 'article_id')->withPivot('comment')->withTimestamps();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function is_commenting($articleId)
    {
        return $this->articles()->where('article_id', $articleId)->exists();
    }
    
    
}
