<?php

namespace App\Repositories;

interface CustomAnswerRepositoryInterface{

    public function updateToggle($bussQuestionId, $selected );
    public function getAnswersOfBusinessTypeQuestion($businessTypeId);
    public function store(array $q_data);
    public function edit($id);
    public function update($id, array $set_data);
    public function getModel();
    public function delete($customAnswerId);
    // public function getModel();
    // public function all();
    // public function questionAnswers($question_id,$businessType_id);
    // public function store(array $q_data);
    // public function edit($id);
    // public function update($id, array $set_data);
    // public function delete($id);

}

