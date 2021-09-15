<?php

namespace App\Http\Controllers\API;
use App\Question;
use App\Qset;
use App\Qanswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Validator;
use FbaHelpers;
use App\Repositories\AnswerRepositoryInterface;


class ApiAnswerController extends Controller
{

  // model property on class instances
  protected $repo_answer;

  //repository constructor
  public function  __construct(AnswerRepositoryInterface $repo_answer){
    $this->repo_answer = $repo_answer;
  }

  //Return all Questions
  public function allAnswers()
  {
    $data = [
      'answers'=>$this->repo_answer->all()
    ];
    return $data;
  }

  //Return Answer base on given qset and question
  public function qanswers(Request $request)
  {
    $Question= Question::find($request->qId);
    $answers = $Question->answer;
    $qset = Qset::find($request->qsetId);
    $question = Question::find($request->qId);
    return compact('qset','question','answers');
  }

  //Return list of business type
  public function getBusinessTypes(Request $request)
  {
    $data= [];
    $data["buss"] = Question::find(FbaHelpers::getSettingsVal(6))->answers->map->only('id','userInput','featured');
    $data["sets"] = Qset::orderBy('id', 'asc')->get();
    $data["questions"] = Question::orderBy('id', 'asc')->get();
    $data["answers"] = Qanswer::orderBy('id', 'asc')->get();
    return $data;
  }
}
