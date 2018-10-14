<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = ['question', 'choice1', 'choice2', 'choice3', 'choice4', 'choice5', 'choice6', 'choice7', 'choice8', 'user_id'];

    //アンケート投稿
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //投票
    public function users()
    {
        return $this->belongsToMany(User::class, 'chart_user', 'chart_id', 'user_id')->withPivot('choice')->withTimestamps();
    }
    
    public function choice1_choices()
    {
        return $this->users()->where('choice', '1');
    }
    
    public function choice2_choices()
    {
        return $this->users()->where('choice', '2');
    }
    
    public function choice3_choices()
    {
        return $this->users()->where('choice', '3');
    }
    
    public function choice4_choices()
    {
        return $this->users()->where('choice', '4');
    }
    
    public function choice5_choices()
    {
        return $this->users()->where('choice', '5');
    }
    
    public function choice6_choices()
    {
        return $this->users()->where('choice', '6');
    }
    
    public function choice7_choices()
    {
        return $this->users()->where('choice', '7');
    }
    
    public function choice8_choices()
    {
        return $this->users()->where('choice', '8');
    }
    
}
