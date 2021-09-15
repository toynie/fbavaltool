<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Qset;
use App\Setting;
use App\Transaction;
use App\TransactionQA;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Repositories\QuestionRepositoryInterface;

class ApiQuestionController extends Controller
{
    // model property on class instances
    protected $repo_question;

    //constructor
    public function __construct(QuestionRepositoryInterface $repo_question)
    {
        $this->repo_question = $repo_question;
    }

    //Return All Question of specific Set
    public function setQuestions(Request $request)
    {
        $set_id=$request->qsetId;
        $data=$this->repo_question->setsQuestions($set_id);
        return $data;
    }

    //Return all Questions
    public function allQuestions()
    {
        $data = $this->repo_question->all();
        return $data;
    }

    // public function getFreeQuestionsAnswers(Request $request){
    //     // dd( $request);
    //     // return $request;
    //     $businessType_id = $request->businessType_id;
    //     // return $businessType_id;
    //     // $businessType_id = $request->businessType_id;
    //     // $freeQuestions =  Question::orderBy('qset_id', 'asc')->where('isFree', '=', '1')->get();
    //     $freeQuestions =  $this->repo_question->getFreeQuestiosWithAnswers($businessType_id);

    //     // dd('fdf');

    //     return $freeQuestions;
    // }
    public function getFreeQuestionsAnswers(Request $request){

        // dd($request->request);
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


        // dd($part );


        $continue_q_a = TransactionQA::where('transaction_id', $transactionId)->get();

        $continue_q_a = $continue_q_a->toArray();


        // dd($userDetails['busstype']);


        //Return first part of questions or second
        if($part == 1){
            $freeQuestions =  $this->repo_question->getFreeQuestiosWithAnswers($userDetails['busstype']);
            // $freeQuestions = $freeQuestions->sortBy('free_index');   //sort collection by  free_index
            // dd($freeQuestions);

        }if($part == 2){
            $freeQuestions =  $this->repo_question->getFullQuestiosWithAnswers($userDetails['busstype'],$transactionId);
        }else{

        }



        // $sets = Qset::select("id","name");
        $sets = Qset::select('id','name')->orderBy('id','asc')->get();


        $settings = Setting::all();

        // return $freeQuestions;


        $settings = Setting::all();

        // return $freeQuestions;

        $freeQa = [
            'questions'=> $freeQuestions,
            'settings'=>$settings
        ];




        return $freeQa;

        // return $freeQuestions;
        // return view('frontend.free_questions', compact('freeQuestions','settings','userDetails', 'sets','continue_q_a','transaction'));













        // dd($freeQuestions);
        // return view('frontend.free_questions', compact('freeQuestions','settings','userDetails', 'sets','continue_q_a','transaction'));
    }

}
