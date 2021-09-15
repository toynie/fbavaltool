<?php

namespace App\Repositories;

use App\Question;
use App\Qanswer;
use App\BussType;
use App\CustomAnwer;
use App\Qset;
use DB;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuestionRepository implements QuestionRepositoryInterface{

  protected $question;
  protected $temp_bussType;

  public function __construct(Question $model){
    $this->question = $model;
  }
  // Get the associated model
  public function getModel(){
    return $this->question;
  }

  public function all(){
    return $this->question->all();
  }

  // Get the associated model
  public function setModel($model)
  {
    $this->question= $model;
    return $this;
  }

  Public function setsQuestions($bussTypeId){

    $this->temp_bussType= $bussTypeId;
    $sets = Qset::orderBy('id')->pluck('name','id');
    $questionsAll = Question::all();  //get list of all questions for adding questions from global

    $questions = Busstype::find($bussTypeId)->questions()
    ->where(function($q) {
      $q
      ->where('busstype_question.busstype_id', $this->temp_bussType)
      ->orWhere('isGlobal', True);
    })
    ->withPivot('questionQid')

    ->get();

    $bussType= Busstype::where('id',$bussTypeId)->select('id','name','initial')->get()->first();

    $data = [
      // 'set'=>$qset,
      'questions'=>$questions,
      'questionsAll'=>$questionsAll,
      'bussType'=>$bussType,
      'sets'=>$sets
    ];
    // dd($questions ->sortBy('questions.qset_id'));
    return $data;
  }

  public function store(array $q_data){

    // dd( $q_data);
    $questionQid  = $q_data['qid'];
    unset($q_data["qid"]);
    $bussTypeId = $q_data["busstype_id"];
    unset($q_data["busstype_id"]);
    $bussType=BussType::findOrFail($bussTypeId);
    $set_id = $q_data['qset_id'];
    $question_data = new Question( $q_data);
    // $q_data_1=$q_data["q_data_1"];
    // $q_data_2=$q_data["q_data_2"];
    // $q_data_3=$q_data["q_data_3"];
    // dd($question_data);
    $bussType->questions()->save($question_data, ['questionQid'=>$questionQid  ]);
  }

  public function edit($id,$bussType){
    if($bussType!=null){
      $bussTypeId= json_decode( $bussType)->id;
      $question = Busstype::find($bussTypeId)->questions()->where('questions.id',$id)->withPivot('questionQid')->first();
      $data=[
        "question"=>$question,
        "bussType"=>$bussType
      ];
    }else{
      // dd('busstype id is null');
      $question = Question::findOrFail($id);
      $data=[
        "question"=>$question,
      ];
    }
    return $data;
  }

  public function update($id, array $question_data)
  {
    if(isset($question_data["bussType"])){
      $bussTypeId = json_decode($question_data["bussType"])->id;
      $bussType = BussType::findOrFail($bussTypeId);
      $questionQid  = $question_data['qid'];
      unset($question_data['qid']);
      $question = Busstype::find($bussTypeId)->questions()->where('questions.id',$id)->withPivot('questionQid')->first();
      $question->pivot->update(['questionQid'=>$questionQid ]);
    }
    else{
      $question = Question::findOrFail($id);
    }
    return $question->update($question_data);
  }

  public function addFromQuestionList($bussTypeId,$QuestionId,$qId){
    $bussType = BussType::findOrFail($bussTypeId);
    // $bussType->questions()->attach($QuestionId); //You are saving

    $bussType->questions()->attach($QuestionId, ['questionQid'=> $qId]);
    // dd($bussType);
  }

  public function delete($bussTypeId, $QuestionId){
    // return $this->question->destroy($id);
    $bussType = Busstype::findOrFail($bussTypeId);

    $bussType->questions()->detach($QuestionId);

  }

  public function getFreeQuestiosWithAnswers($businessType_id){

// dd($businessType_id);


    $this->temp_bussType = $businessType_id;
    $this->businessType_id = $businessType_id;

    $testvar="fdf";


    $freeQuestions = BussType::find($businessType_id)
    ->questions()
    ->where(function($q) {
      $q
      ->where('busstype_question.busstype_id', $this->temp_bussType)
    //   ->orWhere('questions.isGlobal', True)
    ->where('isFree', True)
    // ->where('type', '!=', 10) // do not return question with auto compute like gross margin
      ;

    })
    ->with([
        'customAnswers'=>function($query){
          return $query->where('busstype_id',$this->businessType_id);
        }])
      ->with('qset')
      ->with('answers')
      ->withPivot('questionQid')
    //   ->orderBy('qset_id','asc')
    //   ->orderBy('questions.id','a')
    // ->orderBy('name', 'desc')

    ->get();

    // ->where('isFree', True)
    // ->where('busstype_question.busstype_id', $this->temp_bussType)
    // ->with([
    //   'customAnswers'=>function($query){
    //     return $query->where('busstype_id',$this->businessType_id);
    //   }])
    // ->with('qset')
    // ->with('answers')
    // ->withPivot('questionQid')
    // ->orderBy('qset_id','asc')
    // ->get();
    // dd($freeQuestions);

    return $freeQuestions;
  }
  public function getFullQuestiosWithAnswers($businessType_id,$transactionId){

    // dd($businessType_id);
    // $freeQuestionsWithAnswers = $this->getFreeQuestiosWithAnswers($businessType_id)->pluck('id');
    // dd($freeQuestionsWithAnswers);
    // dd($freeQuestionsWithAnswers->pluck('id'));
    // dd($businessType_id);

    $this->temp_bussType = $businessType_id;
    $this->businessType_id = $businessType_id;

    $testvar="fdf";

    $freeQuestions = BussType::find($businessType_id)
    ->questions()
    // ->whereNotIn('questions.id',$freeQuestionsWithAnswers )
    ->where(function($q) {
      $q
      ->where('busstype_question.busstype_id', $this->temp_bussType)
      ->orWhere('questions.isGlobal', True)
      ;
    })
    // ->where('isFree', false)

    ->with([
      'customAnswers'=>function($query){
        return $query->where('busstype_id',$this->businessType_id);
      }])
    ->with('qset')
    ->with('answers')
    ->withPivot('questionQid')
    ->orderBy('qset_id','asc')
    ->get();


    // dd($freeQuestions);
    return $freeQuestions;
  }
}




