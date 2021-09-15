<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qset extends Model
{

    //one to many of Sets to Questions
    public function questions(){
        return $this->hasMany('App\Question')->orderBy('qid','asc');
    }

    protected $fillable = [
        'id',
        'name',
        'slug',
        'model',
        'question_id',
        'isFree',
        'position',
    ];
}
