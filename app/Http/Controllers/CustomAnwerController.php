<?php

namespace App\Http\Controllers;

use App\CustomAnwer;
use App\Question;
use App\Repositories\CustomAnswerRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use DB;

class CustomAnwerController extends Controller
{

    protected $repo_customAnswer;

    public function __construct(CustomAnswerRepositoryInterface $repo_customAnswer){
        $this->repo_customAnswer = $repo_customAnswer;
    }

    public function index(Request $request)
    {

        // dd('fdf');
        // dd($request);
        $businessQuestion_pivot=json_decode($request->businessQuestion_pivot);
        $businessQuestion_pivot_id =  $businessQuestion_pivot->id;
        $questionId = $businessQuestion_pivot->question_id;
        $qId = $businessQuestion_pivot->questionQid;
        $businessTypeId = $businessQuestion_pivot->busstype_id;
        $customAnswerList = $this->repo_customAnswer->getAnswersOfBusinessTypeQuestion($businessQuestion_pivot_id);
        $set = [
            "id"=> $request->setId,
            "name"=> $request->setName,
        ];

        $data = [
            "businessQuestion_pivot"=>$businessQuestion_pivot,
            "businessQuestion_pivot_id"=>$businessQuestion_pivot_id,
            "questionId"=>$questionId,
            "qId"=>$qId,
            "businessTypeId"=>$businessTypeId,
            "customAnswerList"=>$customAnswerList,
            "set"=> $set,
            "question"=> Question::where('id',$questionId)->get()
        ];

        // dd($data);
        return view('admin.answers.customAnswers.index',compact('data'));
        // return $data;
    }

    public function store(Request $request){
        // dd($request->request);
        // dd($request['businessQuestion_id']);

        $valCommentTitle = $request["valCommentTitle"];
        $valCommentBody = $request["valCommentBody"];
        $valComment = array("title"=>$valCommentTitle , "body"=>$valCommentBody);
        $valComment = json_encode($valComment );

        $request->merge(["valScoreImpactComment"=>$valComment]);

        $business_question_id = $request['business_question_id'];

        $this->repo_customAnswer->store(
            $request->only($this->repo_customAnswer->getModel()->fillable)
        );

          Session::flash('success', 'You successfully added a Question');
          return redirect()->back();

    }

    public function toggle(Request $request)
    {
        // dd($request->request);
        $selected  = $request->select;
        $bussQuestionId =  $request->bussQuestion;
        $this->repo_customAnswer->updateToggle($bussQuestionId, $selected );

        return redirect()->back();

        //
    }

    public function edit($id,Request $request){
        // dd($request->request);
        $answer = $this->repo_customAnswer->edit($id);
        $businessTypeQuestionPivot = $request->businessTypeQuestionPivot;
        $question =$request->question ;
        // return view('admin.customAnswers.edit',compact('answer'));
        return view('admin.answers.customAnswers.edit',compact('answer','businessTypeQuestionPivot','question'));
    }

    public function update(Request $request, CustomAnwer $customAnwer)
    {


        $valCommentTitle = $request["valCommentTitle"];
        $valCommentBody = $request["valCommentBody"];
        $valComment = array("title"=>$valCommentTitle , "body"=>$valCommentBody);
        $valComment = json_encode($valComment );

        $request->merge(["valScoreImpactComment"=>$valComment]);
        //
        // businessTypeQuestionPivot

        // dd($request->request);
        $business_question_id = $request->business_question_id;
        // $bussTypeQuestion = DB::table('busstype_question')->where('id',$business_question_id)->first();

        $businessQuestion_pivot = json_decode($request->businessTypeQuestionPivot);
        // dd($businessQuestion_pivot);


        // dd($bussTypeQuestion);
        $question_id= $businessQuestion_pivot->question_id;


        // dd($bussTypeQuestion);
        $question_id = $request->question_id;
        $id = $request->answerId;

        $this->repo_customAnswer->update(
          $id,
          $request->only($this->repo_customAnswer->getModel()->fillable)
        );

        Session::flash('Success', 'You successfully updated a question set');
        return redirect()->route('cms.customAnswer.index',['qId'=>1,'businessQuestion_pivot'=>json_encode($businessQuestion_pivot)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomAnwer  $customAnwer
     * @return \Illuminate\Http\Response
     */
    public function destroy($answerId,Request $request)
    {

            // dd($request);
        // dd($answerId);
        // $businessQuestion_pivot = json_decode($request->businessTypeQuestionPivot);
        // dd($businessQuestion_pivot);
        // dd($request->businessTypeQuestionPivot);
        // $answer = $this->repo_customAnswer->findOrFail(4);


        $answer = $this->repo_customAnswer->delete($answerId);
// dd($answer);

        // Session::flash('Success', 'You successfully updated a question set');
        // redirect()->back();
        // return redirect()->route('cms.customAnswer.index',['qId'=>1,'businessQuestion_pivot'=>$businessQuestion_pivot]);

        return redirect()->back();
    }
}
