<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qanswer extends Model
{
    //


    public function question(){
        return $this->belongsTo('App\Question','busstype_id')->withPivot('questionQid');
    }


    protected $fillable = [
        'name',
        'question_id',
        'qId',
        'qset_id',
        'qSetId',
        'info',
        'userInput',
        'toolInput',
        'grade',
        'impact',
        'sellability',
        'add',
        'subtract',
        'redFlag',
        'yellowFlag',
        'greenFlag',
        'purpleFlag',
        'blackFlag',
        'popUnderComment',
        'valScoreImpactComment',
        'confidenceImpactScore',
        'confidenceImpactScoreComment',
        'position',
        'featured',
        'dat1',
        'dat2',
        'dat3',

    ];
}
