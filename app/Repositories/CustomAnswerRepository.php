<?php
namespace App\Repositories;
use App\CustomAnwer;
use App\BussType;
use App\Question;
use Session;
use DB;

class CustomAnswerRepository implements CustomAnswerRepositoryInterface{
  protected $customAnswer;
  protected $bussTypeQuestion;

  public function __construct(CustomAnwer $model){
    $this->customAnswer = $model;
  }

  // Get the associated model
  public function getModel(){
    return $this->customAnswer;
  }

  public function getAnswersOfBusinessTypeQuestion($bussQuestionId){
    $customAnswerList = CustomAnwer::where('business_question_id', $bussQuestionId)->get();
    // dd($customAnswerList);
    return $customAnswerList;
  }


  public function store(array $q_data){

    // $question_id = $q_data['question_id'];
    // dd($q_data);

    //   $question_id = $q_data['question_id'];
    //   $question=Question::findOrFail($question_id);

    //   $question->answers()->create($q_data);
    $newCustomAnswer = new $this->customAnswer($q_data);
    // dd($newCustomAnswer);
    $this->customAnswer->create($q_data);

  }

  public function updateToggle($bussQuestionId, $selected ){
    $this->bussTypeQuestion = DB::table('busstype_question')->where('id',$bussQuestionId);
    // $customAnswerList = CustomAnwer::where('business_question_id', $bussQuestionId)->get();
    $customAnswerList = $this->getAnswersOfBusinessTypeQuestion($bussQuestionId);
    $customAnswerList_count = count($customAnswerList);


    if ( $selected == 1) {
        $this->updateDataToggle(0);
    } elseif ( $selected == 0)  {

        //Check if there's a list of custom answer
        if($customAnswerList_count<=0){
            Session::flash('custom_error', 'You have no listed custom answer, please create a custom Answer for this question');
        }else{
            $this->updateDataToggle(1);
        }
    }
  }

  public function updateDataToggle($data){
    $this->bussTypeQuestion->update(
        ['useCustomAnswer'=>$data]
    );
  }


  public function edit($id){
    // return $this->answer->findOrFail($id);
    return $this->customAnswer->findOrFail($id);
  }

  public function update($id, array $set_data){
    // dd($set_data);
    // dd($set_data);
    $answer = $this->customAnswer->findOrFail($id);
    return $answer->update($set_data);
  }

  public function delete($customAnswerId){
    $answer = $this->customAnswer->findOrFail($customAnswerId);
    $set_data =  $answer;
    // dd($answer);

    $answer->delete();



// return $this->customAnswer->delete($customAnswerId);
// return $this->customAnswer->delete($customAnswerId);;

    return;
  }

}
