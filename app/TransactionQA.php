<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionQA extends Model
{
    //
    // protected $casts = [
    //     'is_admin' => 'boolean',
    // ];
    protected $casts = [
        'inputValArray' => 'array',
        'checkBox' => 'array'
    ];

    protected $fillable = [
        'transaction_id',
        'question_id',
        'qanswer_id',
        'inputVal',
        'inputValArray',
        'checkBox',
    ];

}
