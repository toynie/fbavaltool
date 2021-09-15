<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomAnwer extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'busstype_id',
        'question_id',
        'business_question_id',
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
