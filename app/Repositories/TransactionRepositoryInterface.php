<?php

namespace App\Repositories;
use Illuminate\Http\Request;

interface  TransactionRepositoryInterface{

    public function getTransactionById($id);
    public function addQA(Request $request);
}




