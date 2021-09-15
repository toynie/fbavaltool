<?php

namespace App\Repositories;

interface  TransactionQARepositoryInterface{
    public function getModel();
    // public function getFreeQAResult($transaction_id,$businessTypeId);
    public function getFreeQAResult($transaction_id,$businessTypeId);
    public function getQATransactionBySet($transaction_id, $setId, $businessTypeId);
}




