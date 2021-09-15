<?php

namespace App\Http\Controllers;

use App\BussType;
use App\Question;
use App\Qset;
use App\Setting;
use App\TransactionQA;
use App\Transaction;
use App\Repositories\QuestionRepositoryInterface;
use App\Rules\ValidQuestionQid;
use App\Rules\ValidQuestionId;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Session;

class QuestionController extends Controller
{
    protected $repo_question;

    public function __construct(QuestionRepositoryInterface $repo_question)
    {
        $this->repo_question = $repo_question;
    }

    //shows business type - questions, change later
    public function index(Request $request)
    {
        $bussTypeId=$request->bussType;
        $data=$this->repo_question->setsQuestions($bussTypeId);

        return view('admin.questions.index',compact('data'));
    }

    //shows all questions, change later to index
    public function allQuestions(Request $request){

        $data=$this->repo_question->all();
        // dd($data);
        return view('admin.questions.all',compact('data'));


    }


    public function getFreeQuessAnswers(Request $request){

        // dd($request);
        $transaction = null;
        if(isset($_GET['transactionId'])){
            // dd($_GET['transactionId']);
            $transaction  = Transaction::findOrFail($_GET['transactionId']);

        }
        // dd($request);
        $part = $request->part;
        $transactionId = $request->transactionId;

        $userDetails['busstype'] = $request->busstype;
        $userDetails['website'] = $request->website;
        $userDetails['name'] = $request->name;
        $userDetails['email'] = $request->email;


        // $continue_q_a = TransactionQA::where('transaction_id', $transactionId)->get()->mapWithKeys(function ($item) {
        //     return [
        //         $item['question_id'] => [
        //             'qanswer_id' => $item['qanswer_id'],
        //             'inputVal' => $item['inputVal'],
        //             'inputValArray' => $item['inputValArray'],
        //             'checkBox' => $item['checkBox'],
        //             'transaction_id' => $item['transaction_id'],
        //             'transaction_qa_id' => $item['id'],
        //         ]
        //     ];
        // })->toArray();



        $continue_q_a = TransactionQA::where('transaction_id', $transactionId)->get();
        $continue_q_a = $continue_q_a->toArray();
        // dd($continue_q_a);





        //Return first part of questions or second
        if($part == 1){
            // dd('fdf');
            $freeQuestions =  $this->repo_question->getFreeQuestiosWithAnswers($userDetails['busstype']);
            // dd($freeQuestions);
        }if($part == 2){
            $freeQuestions =  $this->repo_question->getFullQuestiosWithAnswers($userDetails['busstype'],$transactionId);
        }else{

        }



        // $sets = Qset::select("id","name");
        $sets = Qset::select('id','name')->orderBy('id','asc')->get();


        $settings = Setting::all();

        // dd($freeQuestions);
        return view('frontend.free_questions', compact('freeQuestions','settings','userDetails', 'sets','continue_q_a','transaction'));

    }

    public function tool($option, $slug)
    {
        $slug = explode('-', $slug);
        $businessType = BussType::find($slug[0]);
        return view('frontend.free_questions', [
            'businessType' => $businessType
        ]);
    }


    public function userDetailsPage(Request $request){
        $busstype_id = $request->busstype;
        return view('frontend.getuserinfo',compact('busstype_id'));
    }

    public function store(Request $request)
    {
        // dd($request);

        $bussTypeId = $request->busstype_id;
        $qId = $request->qid;
        $qset_id = $request->qset_id;
        // dd($qset_id);

        $bussType=BussType::findOrFail($request->busstype_id);

        $this->validate($request,[
            'name'=>'required',
            'qid'=> ['required','integer', new ValidQuestionQid($bussTypeId,null,$qId,null,$qset_id)],
        ]);

        $this->repo_question->store(
            $request->only($this->repo_question->getModel()->fillable)
        );

        $qsetId= $request->qsetId;
        $bussType = $request->busstype_id;

        Session::flash('success', 'You successfully added a Question');
        return redirect()->back()->with($qsetId, $bussType);
    }

    public function addFromQuestionList(Request $request){

        $bussTypeId = $request->busstype_id;
        $questionId = $request->id;
        $qId = $request->qid;

        $this->validate($request,[
            'question-name'=>'required',
            'id'=>['required','integer',new ValidQuestionId($bussTypeId,$questionId)],
            'qid'=> ['required','integer', new ValidQuestionQid($bussTypeId,$questionId,$qId,null)],
        ],
        [
            'question-name.required'=>'Please Select Question from the button above',
            'id.required'=>null,
        ]
        );

        $this->repo_question->addFromQuestionList(
            $bussTypeId,
            $questionId,
            $qId
        );
        return redirect()->back();
    }

    public function edit($id,Request $request)
    {
        $bussType = $request->bussType;

        // if($bussType!=null){
            $data = $this->repo_question->edit($id,$bussType);
            return view('admin.questions.edit',compact('data'));
        // }
    }

    public function update(Request $request, Question $question)
    {

        if($request->bussType!=null){
            $bussType=json_decode($request->bussType);
            $bussTypeId=$bussType->id;
            $qId = $request->qid;
            $request->request->remove('busstype_id');
        }else{}

        $questionId = $request->id;

        if($request->qid!=$request->old_quetionQid){

            if($request->bussType!=null){
                $this->validate($request,[
                    'name'=>'required',
                    'qid'=> ['required','integer',
                        new ValidQuestionQid($bussTypeId,$questionId,$qId,null)]
                ]);
            }else{
                $this->validate($request,[
                    'name'=>'required',
                ]);
            }

        }
        else{
            // dd('same');
        }

        $this->repo_question->update(
            $question->id,
            $request->only($this->repo_question->getModel()->fillable)
        );

        Session::flash('Success', 'You successfully updated a question set');


        if($request->bussType!=null){
            return redirect()->route('cms.question.index',[
                'qsetId'=>$question->qset_id,
                'bussType'=>$bussTypeId
            ]);
        }else{
            return redirect()->route('cms.questions.all',[
                'qsetId'=>$question->qset_id,

            ]);
        }


    }

    public function destroy(Request $request,$id)
    {
        $bussType=json_decode($request->bussType);
        $bussTypeId=$bussType->id;

        $this->repo_question->delete($bussTypeId, $id);
        Session::flash('Success', 'You successfully Deleted a question set');
        return redirect()->back();
    }

}
