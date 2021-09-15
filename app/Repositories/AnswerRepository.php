<?php
namespace App\Repositories;
use App\Qanswer;
use App\BussType;
use App\Question;
use App\CustomAnwer;
// use App\Qset;

class AnswerRepository implements AnswerRepositoryInterface{
  protected $answer;

  public function __construct(QAnswer $model){
    $this->answer = $model;
  }

  // Get the associated model
  public function getModel(){
    return $this->answer;
  }

  // Set the associated model
  public function setModel($model){
    $this->answer = $model;
    return $this;
  }

  public function all(){
    return $this->answer->all();
  }

  public function questionAnswers($question_id,$businessType_id){

    // dd($businessType_id);

    //Set Null Answer
    $answers = null;
    $businessType= null;
    $businessTypes = null;
    $customAnswerList= null;

    $customAnswer =null;

    //If Buisness Type is Available
    if (isset($businessType_id)){
        $bussType_id = $businessType_id;
        $businessType = BussType::findOrFail($bussType_id);
        $question = $businessType->questions()->where('questions.id',$question_id)->first();
        // dd($businessType->questions());
        // dd($question->pivot->id);
        // dd( $businessType->questions()->where('questions.id',$question_id)->first());
        $questionPivot_id= $question->pivot->id;
        // $customAnswer = $question->pivot->customAnswer;
        $useCustomAnswer = $question->pivot->useCustomAnswer;
        $customAnswerList = CustomAnwer::where('business_question_id', $questionPivot_id)->get();;

        // dd($useCustomAnswer);
        if($useCustomAnswer ==0){
            $answers =  $question->answers()->get();
            // dd($answers );
        }else{

            // dd($questionPivot_id);

            $answers = CustomAnwer::where('business_question_id', $questionPivot_id)->get();
            // $customAnswerList = CustomAnwer::where('business_question_id', $questionPivot_id)->get();;
            // $customAnswer =$customAnswer = $question->pivot->customAnswer;

        }
    }

    // If Business Type is not Available
    else{
        $question = Question::findOrFail($question_id);
        $businessTypes = $question->bussTypes();
        $answers = $question->answers()->get();
        // dd($answers);
    }
    // dd($answers );

    // dd($question);
    //Getu All Business Types Associated to selected Question
    // $businessTypes = $question->bussTypes();

    // dd($question->bussTypes());
    $businessTypes = $question->bussTypes();

    //Get Question Set
    $set = $question->qset()->get();

    $data = [
        'set'=>$set,
        'question'=>$question,
        'bussinessType'=>$businessType,
        'answers'=>$answers,
        'Question_BussinessTypes'=>$businessTypes,
        'businessQuestion_pivot'=>$question->pivot,
        'customAnswerList' => $customAnswerList,
        'useCustomAnswer' => $useCustomAnswer,
    ];

    return $data;

  }


  public function store(array $q_data){



    if (in_array("featured", $q_data)){
      $question=Question::findOrFail($q_data['qId']);
      $featured = $q_data['featured'];
      $featured_new_name = time().$featured->getClientOriginalName(); //concatinate with current time and the filename
      $featured->move('uploads/img', $featured_new_name);
      $arrayname['featured'] = 'uploads/img/' . $featured_new_name;
    }

    $question_id = $q_data['question_id'];
    $question=Question::findOrFail($question_id);
    $question->answers()->create($q_data);
  }

  public function edit($id){
    //   dd();
    return $this->answer->findOrFail($id);
  }

  public function update($id, array $set_data){
    $answer = $this->answer->findOrFail($id);
    return $answer->update($set_data);
  }

  public function delete($id){
    return $this->answer->destroy($id);
  }

}
