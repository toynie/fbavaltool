<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function answers(){
        return $this->hasMany('App\TransactionQA');
    }

    public function qset()
    {
        return $this->belongsTo('App\Busstype');
    }
    // public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'busstype_id',
        'website',
        'contact',
        'created_at',
        'updated_at'
    ];
}
