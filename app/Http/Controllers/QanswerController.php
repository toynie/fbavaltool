<?php
namespace App\Http\Controllers;
use App\Qanswer;
use Illuminate\Http\Request;
use Session;
use App\Repositories\AnswerRepositoryInterface;

class QanswerController extends Controller
{
  protected $repo_answer;

  public function __construct(AnswerRepositoryInterface $repo_answer){
    $this->repo_answer = $repo_answer;
  }

  public function index(Request $request){
    //   dd($request->request);
    $businessType_id=$request->businessType_id;
    $question_id = $request->question_id;


    if($request->businessType_id){
        $businessType_id= $request->businessType_id;
    }

    // dd();
    $data = $this->repo_answer->questionAnswers($question_id,$businessType_id);
    // dd($data);
    return view('admin.answers.index',compact('data'));
  }

  public function store(Request $request){
    // $request->request["valComment"] = "fdf";
    // $request["grade"]="fdfdfdf";
    // $request["grade"]->delete();

    // dd($request->request);
    $valCommentTitle = $request["valCommentTitle"];
    $valCommentBody = $request["valCommentBody"];
    $valComment = array("title"=>$valCommentTitle , "body"=>$valCommentBody);
    $valComment = json_encode($valComment );

    $request->merge(["valScoreImpactComment"=>$valComment]);
    // dd($request->request);


    $this->repo_answer->store(
      $request->only($this->repo_answer->getModel()->fillable)
    );

    Session::flash('success', 'You successfully added a Question');
    return redirect()->back();
  }

  public function edit($id, Request $request){
    // dd($id);
    $answer = $this->repo_answer->edit($id);
    $businessQuestion_pivot =$request->businessQuestion_pivot ;
    $question =$request->question ;
    // dd($request);
    // dd($businessQuestion_pivot);
    $data=[
        "answer"=>$answer,
        "businessQuestion_pivot"=>$businessQuestion_pivot,
        "question"=>    $question,
    ];

    // dd($answer);
    // dd($request);
    return view('admin.answers.edit',compact('data'));
    // return view('admin.answers.edit',compact('answer'));
  }

  public function update(Request $request, Qanswer $qanswer){


    $valCommentTitle = $request["valCommentTitle"];
    $valCommentBody = $request["valCommentBody"];
    $valComment = array("title"=>$valCommentTitle , "body"=>$valCommentBody);
    $valComment = json_encode($valComment );

    $request->merge(["valScoreImpactComment"=>$valComment]);

    // dd($request->businessQuestion_pivot);
    $businessQuestion_pivot = json_decode($request->businessQuestion_pivot);
    $question_id = $businessQuestion_pivot->question_id;
    $businessType_id= $businessQuestion_pivot->busstype_id;
    $id = $request->answerId;

    $this->repo_answer->update(
      $id,
      $request->only($this->repo_answer->getModel()->fillable)
    );

    Session::flash('Success', 'You successfully updated a question set');
    // return redirect()->route('cms.answer.index',['qId'=>$question_id,]);
    return redirect()->route('cms.answer.index',['question_id'=>$question_id,'businessType_id'=>$businessType_id,]);
  }

  public function destroy($answerId){
    $id= $answerId;
    $this->repo_answer->delete($id);
    Session::flash('Success', 'You successfully Deleted a question set');
    return redirect()->back();
  }

  public function getAnswerCode(){
    return 'test answer code';
  }
}
