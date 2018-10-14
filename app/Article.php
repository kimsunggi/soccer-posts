<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['area', 'title', 'content', 'url', 'img_src'];
    
    
    public function user()
    {
        return $this->belongsToMany(User::class, 'comments', 'article_id', 'user_id')->withPivot('comment')->withTimestamps();
    }
}
