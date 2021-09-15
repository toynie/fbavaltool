<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BussType extends Model
{

    protected $table = 'busstypes';



    //
    // public function questions(){
    //     return $this->hasMany('App\Question')->orderBy('qid','asc');
    // }
    public function questions(){
        return $this->belongsToMany('App\Question', 'busstype_question', 'busstype_id')
        ->withPivot('id')
        ->withPivot('question_id')
        ->withPivot('questionQid')
        ->withPivot('useCustomAnswer')
        // ->orderBy('qset_id','asc')
        // ->orderBy('id','asc')
        ;
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }


    public function customAnswers(){
        return $this->hasManyThrough('App\CustomAnwer', 'App\Question');
    }

    protected $fillable = [
        'id',
        'name',
        'toolInput',
        'initial',
        'isActive'
    ];
}
