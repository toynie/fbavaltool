<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function answers(){
        return $this->hasMany('App\Qanswer');
    }

    public function customAnswers(){
        return $this->hasMany('App\CustomAnwer');
    }

    // public function customAnswers(){
    //     return $this->hasManyThrough('App\CustomAnwer', 'App\Question');
    // }


    public function testanswers($id){
        // dd($quuery);
        // /
    }

    public function qset()
    {
        return $this->belongsTo('App\Qset');
    }

    public function bussType(){
        return $this->belongsTo('App\BussType','question_id','question_id','busstype_id')->withPivot('questionQid');
    }

    public function bussTypes(){
        // dd(0);
        // dd($this);
// dd($this->belongsToMany('App\BussType','busstype_question')->get());



        return $this->belongsToMany('App\BussType','busstype_question','question_id','busstype_id')
        ->withPivot('questionQid')
        ->withPivot('useCustomAnswer')
        ->orderBy('id','asc')
        ->get();
        // $data =  $this->belongsToMany('App\BussType','busstype_question','busstype_id','question_id')
        // ->withPivot('questionQid')
        // ->withPivot('useCustomAnswer')
        // ->orderBy('id','asc')
        // ->get();
        // dd($data);
    }

    public function questionWithPivot(){
        return $this->withPivot('questionQid');

    }

    protected $fillable = [
        'name',
        'model',
        'qset_id',
        // 'position',
        'busstype_id',
        'qid',
        'm_p_mult',
        'm_n_mult',
        'type',
        'inputType',
        'isFree',
        'isGlobal',
        'typeStyle',
        'q_dat_1',
        'q_dat_2',
        'q_dat_3',
    ];

    //one to many of Questions to Qanswer
    // public function qanswers(){
    //     return $this->hasMany('App\Qanswer');
    // }

}
