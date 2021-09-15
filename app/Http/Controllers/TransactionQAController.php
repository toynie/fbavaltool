<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionQA;
use Illuminate\Http\Request;
use FbaHelpers;

class TransactionQAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {

    //         // dd($request->request);
    //     // $QAresults = Transaction::find($request->transactionId)->answers;
    //     $paidOutputResult =FbaHelpers::getPaidOutputAll($request->transactionId);

    //     return view('admin.qa.index',compact('paidOutputResult'));
    //     // dd($QAresults);

    // }

    // public function analysis()
    // {
    //     // FbaHelpers::getAnalysisBySetId(2);
    //     $testTransactionId =1;

    //     $transactionId = 1;

    //     $freeQuestions =  FbaHelpers::getFreeQuestions();
    //     $paidOutputResult = FbaHelpers::getPaidOutputAll($testTransactionId );

    //     // $QAresults = FbaHelpers::getPaidOutput($transactionId);
    //     // return view('admin.analysis.output',compact('freeQuestions','QAresults'));
    //     return view('admin.analysis.output',compact('freeQuestions','paidOutputResult'));



    // }


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
     * @param  \App\TransactionQA  $transactionQA
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionQA $transactionQA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionQA  $transactionQA
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionQA $transactionQA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionQA  $transactionQA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionQA $transactionQA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionQA  $transactionQA
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionQA $transactionQA)
    {
        //
    }
}
