<?php

namespace App\Repositories;

interface AnswerRepositoryInterface{

    public function getModel();
    public function all();
    public function questionAnswers($question_id,$businessType_id);
    public function store(array $q_data);
    public function edit($id);
    public function update($id, array $set_data);
    public function delete($id);

}

