<?php

namespace App\Repositories;

interface  QuestionRepositoryInterface{

    Public function setsQuestions($bussTypeId);
    public function store(array $data);
    public function addFromQuestionList($bussTypeId,$QuestionId,$qId);
    public function getModel();
    public function edit($id,$bussTypeId);
    public function update($id, array $set_data);
    public function delete($bussTypeId, $QuestionId);
    public function all();
    public function getFreeQuestiosWithAnswers($transaction_id);
    public function getFullQuestiosWithAnswers($transaction_id,$transactionId);
    // public function getFreeQAResult($transaction_id);
}




