<?php

namespace App\Http\Controllers;

// use App\Freequestion;
use App\Question;
use App\Qset;
use FbaHelpers;
use App\Repositories\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class FreequestionController extends Controller
{


    protected $repo_question;

    public function __construct(QuestionRepositoryInterface $repo_question)
    {
        $this->repo_question = $repo_question;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bussType)
    {
        // dd($bussType);
        //
        // $qsets=  Qset::orderBy('id', 'asc')->get();
        // $qsets=  FbaHelpers::getAllQuestionSet();
        // $freeQuestions=  FbaHelpers::getFreeQuestions();
        $freeQuestions =  $this->repo_question->getFreeQuestiosWithAnswers($bussType);


        // $freequestion = $freequestion->sortBy('free_index');
        // dd($freeQuestions );
        return view('admin.free.index',compact('freeQuestions','bussType'));
        // return view('admin.questions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Freequestion  $freequestion
     * @return \Illuminate\Http\Response
     */
    public function show(Freequestion $freequestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Freequestion  $freequestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Freequestion $freequestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Freequestion  $freequestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freequestion $freequestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Freequestion  $freequestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freequestion $freequestion)
    {
        //
    }
}
