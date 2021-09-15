<?php

namespace App\Repositories;

use App\TransactionQA;
use App\Transaction;
use App\Qset;
use App\Question;
use App\Busstype;
use App\Qanswer;
use DB;
use FbaHelpers;

class TransactionQARepository implements TransactionQARepositoryInterface
{

    protected $transactionQA;
    protected $temp_bussType;

    public function __construct(TransactionQA $model,BussTypeRepositoryInterface $repo_bussType)
    {
        $this->transactionQA = $model;
        $this->temp_bussType = $repo_bussType;
    }

    // Get the associated model
    public function getModel()
    {
        return $this->transactionQA;
    }

    // public function getFreeQAResult($transaction_id, $businessTypeId, $bussTypeData = null)
    public function getFreeQAResult($transaction_id, $businessTypeId)
    {



        // $test = $this->temp_bussType->get($businessTypeId);
        // dd($transaction_id);

        // $businessType? $_busstypeType = $businessType->toArray()  :$_busstypeType= Busstype::findOrFail($businessTypeId)->toArray() ;


        $transaction = Transaction::findOrFail($transaction_id);

        $_busstypeType= Busstype::findOrFail($businessTypeId)->toArray();
        // dd($businessTypeId);

        $this->temp_bussType=$_busstypeType;

        $sets = Qset::all();


        // return "dd";
        $questionCount = Question::count();
        $questionHasAnswer = FbaHelpers::getFreeQuestions()->count();
        // return $questionCount;

        $valArrayValEffect = [
            'multiplerEffect'=>0,
            'redYellowFlag'=>0,
            'greenPurpleFlag'=>0,
            'baseMultiplier'=>0,
            'grandTotalconfidenceImpactScore'=>0,
        ];  //For Array Val
        $multiplerEffect = 0;
        $redYellowFlag = 0;
        $greenPurpleFlag = 0;
        $baseMultiplier = 0;
        $grandTotalconfidenceImpactScore = 0;
        // return $baseMultiplier;



        foreach ($sets  as $key => $value) {


            $qas = $this->getQATransactionBySet($transaction_id, $value->id,$businessTypeId);

            // dd($qas);

            $valEffect = 0;
            $redFlag = 0;
            $yellowFlag = 0;
            $greenFlag = 0;
            $purpleFlag = 0;
            $blackFlag = 0;
            $confidenceImpactScore = 0;
            // $confidenceBase = .40;   //static val confirm later
            $confidenceBase  = (float)FbaHelpers::confidenceBase(); //static val confirm later



            foreach ($qas as  $qa) {

                if ($qa['valuationEffect']) {
                    $valEffect  +=  $qa['valuationEffect'];
                    $multiplerEffect  +=  $qa['valuationEffect'];
                }

                if ($qa['redFlag'] == 1) {
                    $redFlag  +=  $qa['redFlag'];
                    $redYellowFlag  +=  $qa['redFlag'];
                }
                if ($qa['yellowFlag'] == 1) {
                    $yellowFlag  +=  $qa['yellowFlag'];
                    $redYellowFlag  +=  $qa['yellowFlag'];
                }
                if ($qa['greenFlag'] == 1) {
                    $greenFlag  +=  $qa['greenFlag'];
                    $greenPurpleFlag  +=  $qa['greenFlag'];
                }
                if ($qa['purpleFlag'] == 1) {
                    $purpleFlag  +=  $qa['purpleFlag'];
                    $greenPurpleFlag  +=  $qa['purpleFlag'];
                }
                if ($qa['confidenceImpactScore']) {
                    $confidenceImpactScore  +=  $qa['confidenceImpactScore'];
                    $grandTotalconfidenceImpactScore +=  $qa['confidenceImpactScore'];
                }
            }

            // echo "<br>-$value->name--<br>";


            /* Check For Array Val */
            $questionWithArrayVal = Question::where('isFree',True)->where('type',7)->where('qset_id',$value->id)->get();

            if (count($questionWithArrayVal)>0){

                // echo $questionWithArrayVal."<br><br>";
                //Loop To Question with Array Val
                foreach ($questionWithArrayVal as $key => $questionArrayVal) {
                    # code...
                    // echo "<br>". $questionArrayVal->name."-$questionArrayVal->id"."<br>";

                    //Get the list of answers to question

                    $questionArrayValID = $questionArrayVal->id;

                    //List of Answer for the question that has the attributes from excel
                    $listofAnswersForQuestion = QAnswer::where('question_id',$questionArrayValID )->get();
                    // dd($listofAnswersForQuestion->toArray());

                    $valArrayQuestionMaxPositive =  $questionArrayVal->m_p_mult;
                    $valArrayQuestionMaxNegative =  $questionArrayVal->m_n_mult;
                    // echo  "Max Positive:$valArrayQuestionMaxPositive || Max Negative: $valArrayQuestionMaxNegative <br>";

                    //Get the transaction with val array
                    $IfArrayValAnswered = TransactionQA::where('question_id', $questionArrayVal->id)->where('transaction_id',$transaction_id)->get() ;

                    // $answersToQuestionList = QAnswer::where( "question_id",$IfArrayValAnswered->question_id);

                    // dd($IfArrayValAnswered);


                    $valArrayFormulaValEffection = [0,-0.02,-0.05,-0.1,-0.05,-0.02,-0.05];


                    if(count($IfArrayValAnswered)){
                        //---> here you execute the  needed function

                        // dd($IfArrayValAnswered[0]);
                        // dd($IfArrayValAnswered);
                        // $answerValArray = json_decode($IfArrayValAnswered[0]->inputValArray);
                        $answerValArray =$IfArrayValAnswered[0]->inputValArray;

                        // dd($answerValArray );
                        // Loop at the arravy Value
                        $answerValArrayIndex = 0;
                        // dd($answerValArray);
                        foreach ($answerValArray as $key => $answerValArrayValue) {

                            $localValArrayToUse = 0;

                            // if($localValArrayToUse > .7)

                            // dd($answerValArrayValue);
                            $answerValArrayIndex += 1;
                            // echo "---->".current($answerValArray )."<br>";
                            // $valEffect  +=  $qa['valuationEffect'];
                            // =IF(userInput>0.7,-0.05,0)
                            // dd(count($IfArrayValAnswered));



                            if(($answerValArrayValue/100) > 0.7){

                                // if($key = 136){
                                    // dd($answerValArrayValue);
                                    // echo "---------->".$valArrayFormulaValEffection[$answerValArrayIndex -1]."<br>";
                                    // echo "---------->". $valArrayFormulaValEffection[$answerValArrayIndex-2 ]."<br>";
                                    // dd($valArrayFormulaValEffection[$answerValArrayIndex -1]);
                                // }


                                // $valArrayValEffect += (-0.05);
                                $valArrayValEffect['multiplerEffect'] += ($valArrayFormulaValEffection[$answerValArrayIndex -1]);


                                //Update ValEffect
                                $valEffect   += ($valArrayFormulaValEffection[$answerValArrayIndex -1]);
                                $multiplerEffect   += ($valArrayFormulaValEffection[$answerValArrayIndex -1]);

                                //Update Red Flag
                                // DB::raw('( IF(sellability<2, 1, 0)) as redFlag'),
                                // If

                                // echo $valArrayValEffect['multiplerEffect'];

                            }
                            else{
                                // echo "---------->0<br>";

                            }

                            if(($answerValArrayValue/100) > 0.6){
                                $yellowFlag  +=  1;
                                $redYellowFlag  +=  1;
                            }else{}





                            // echo "ID:$key------------------Answer:$answerValArrayValue------------------". $valArrayFormulaValEffection[$answerValArrayIndex -1]."<br>";
                            # code...
                        }

                        // print_r($answerValArray);

                    }
                    // echo "<br><br>";
                    // echo "total ValArray Effect: ".$valArrayValEffect['multiplerEffect']."<br>";

                }




            } else{

            }





            $setTotalQA[$value["id"]] =  [
                "setInfo" => $value,
                "qa" => $qas,
                "setTotals" => [
                    "valEffect" => $valEffect,
                    "redFlag" => $redFlag,
                    "yellowFlag" => $yellowFlag,
                    "greenFlag" => $greenFlag,
                    "purpleFlag" => $purpleFlag,
                    "confidenceImpactScore" => $confidenceImpactScore
                ],
            ];

            // echo "<hr>";
        }



        // $baseMultiplier = $this->getQATransactionBySet($transaction_id, 1)[0]["toolInput"];
        // $baseMultiplier = $this->getQATransactionBySet($transaction_id, 1)[0]["toolInput"];
        // dd($businessType);
        // dd($businessType->toolInput);
        // dd ($businessType["toolInput"]);
        // $baseMultiplier = $businessType->toolInput;

        // $baseMultiplier = $_busstypeType["toolInput"];
        $baseMultiplier = $_busstypeType["toolInput"];
        // dd($baseMultiplier);
        // $baseMultiplier = 3.6;

        // dd($transaction_id);
        $netProfit = FbaHelpers::getNetProfit($transaction_id);
        // $netProfit = 99500;
        // $valMultiplierX = $baseMultiplier + $multiplerEffect;
        // dd( $netProfit);
        $valMultiplierX = $baseMultiplier + $multiplerEffect;
        // $valuationRangePercent = 10 / 100; //static val confirm later

        $valuationRangePercent = (float)FbaHelpers::getValuationRangePercent() / 100 ; //static val confirm later
        $valuationDollar = $netProfit * $valMultiplierX;



          //if Part 2  and continue later get  qa
        // $continue_q_a = TransactionQA::where('transaction_id',$transaction['id'])->get();
        $continue_q_a = TransactionQA::where('transaction_id',$transaction['id'])->get()->mapWithKeys(function ($item) {
            return [
                $item['question_id'] => [
                    'qanswer_id' => $item['qanswer_id'],
                    'inputVal' => $item['inputVal'],
                    'inputValArray' => $item['inputValArray'],
                    'checkBox' => $item['checkBox'],
                    'transaction_id' => $item['transaction_id'],
                    'transaction_qa_id' => $item['id'],
                ]
            ];
        })->toArray();
        // $continue_q_a = TransactionQA::where('transaction_id',$transaction['id'])->pluck( 'qanswer_id','question_id','id');
        // $continue_q_a = TransactionQA::where('transaction_id',$transaction['id'])->map(function ($dat) {
        //     return $dat-;
        // });

        // $continue_q_a  = $continue_q_a->toArray();
        // dd( $setTotalQA );
        $toreturn =  [
            "setQA" => $setTotalQA,
            "totalMultiplierEffect" => [
                "multiplerEffect" => $multiplerEffect,
                "redYellowFlag" => $redYellowFlag,
                "greenPurpleFlag" => $greenPurpleFlag,
            ],
            "baseMultiplier" => $baseMultiplier,
            "valImpactSellerResponse" => $multiplerEffect,
            "netProfit" => $netProfit,
            "valMultiplierX" => $valMultiplierX,
            "valuationDollar" => $valuationDollar,
            "valuationRangePercent" => $valuationRangePercent, //static val confirm later
            //   "valuationRange$"=>"$".
            //     ($valuationDollar - ($valuationDollar*$valuationRangePercent)).
            //     " - ".
            //     ($valuationDollar + ($valuationDollar*$valuationRangePercent)),
            "valuationRange$" => [
                ($valuationDollar - ($valuationDollar * $valuationRangePercent)),
                ($valuationDollar + ($valuationDollar * $valuationRangePercent))
            ],
            "valuationAccuracyEstimate" => ($questionCount - $questionHasAnswer) / $questionHasAnswer,
            "totalConfidenceImpactScore" => $grandTotalconfidenceImpactScore,
            "confidenceScore" => 1 - (0 + $grandTotalconfidenceImpactScore / 100) * (1 - $confidenceBase) - 0.15,
            "confidenceBase" => $confidenceBase,
            "continue_q_a"=>$continue_q_a,
            "transactionInfo" => [
                "transactionId" => $transaction['id'],
                "clientName" => $transaction['name'],
                "clientEmail" => $transaction['email'],
                "clientContact" => $transaction['contact'],
                "whyValuate" => $transaction['whyValuate'],
                "transactionCreated" => $transaction['created_at'],
                "businessType" => $_busstypeType,
            ],
        ];

        // dd($toreturn);

        return $toreturn;
    }

    //get the flag and multiple effect if the answer is array value
    public function getValIfArray($whatToGEt,$questionsId,$transaction_id){
        // return $questionsId;
        // dd($transaction_id);
        // return ((int)json_decode($transaction_id) );
        // dd($transaction_id);
        // return $transaction_id;
        // dd($transaction_id);
        // return $transaction_id + $questionsId;



        $transactionQAId= $transaction_id;
        $transaction = TransactionQA::find($transactionQAId);
        $inputValArray = json_decode($transaction->inputValArray,true);
        // return 20;
        return $inputValArray[136];












        // $a= (int)$transaction_id + 1;
        // return ((int)json_decode($transaction_id)) + 1;
        // return 0;




        /*
        1=redFlag
        2=yellowFlag
        3=greenFlag
        4=purple
        5=black
        */

        // $answers = Qanswer::where('question_id',$questionId)->sum('grade');
        $answers = Qanswer::where('question_id',$questionId);

        return $answers;
        switch ($whatToGEt) {
            case 3:

             $inputValArray;
             return $a ;

                break;

            default:
                # code...
                break;
        }

        // return $whatToGEt;
    }
    public function getQATransactionBySet($transaction_id, $setId, $businessTypeId)
    {
        // dd($businessTypeId);

        $transactionQAResult = $this
            ->transactionQA
            ->join('questions', 'questions.id', 'transaction_q_a_s.question_id')
            // ->join('qanswers', 'qanswers.id', 'transaction_q_a_s.qanswer_id')
            ->leftJoin('qanswers', 'qanswers.id', 'transaction_q_a_s.qanswer_id')
            ->leftJoin('transactions', 'transactions.id', 'transaction_q_a_s.id')
            // ->leftJoin('busstype_question', 'busstype_question.id', 'transactions.busstype_id')

            ->join('busstype_question', function ($join) {
                $join->on('questions.id', '=', 'busstype_question.question_id')
                     ->where('busstype_question.busstype_id', '=', 3);
            })
            ->select(

                // "busstype_question.questionQid",

                //Transaction
                "transactions.busstype_id as bussTypeId",

                //Transaction QA
                "transaction_id",
                "qanswer_id",
                "inputVal",
                "inputValArray",

                //busstype_questions
                // "busstype_question.questionQid as qid",
                "busstype_question.questionQid as qid",

                //Set
                "questions.qset_id as set_id",

                //Question
                "questions.id as question_id",
                "questions.name as question_name",
                "questions.m_p_mult as question_m_p_mult",
                "questions.m_n_mult as question_m_n_mult",
                // "questions.qid as question_code", ///updated
                "questions.isFree as qestion_isFree",
                "questions.type as qestion_type",

                // Answer Col,
                "info as answer_info",
                "userInput",
                "toolInput",
                "grade",
                "impact",
                "sellability",
                "add",

                "subtract",
                // DB::raw("(impact * 3)  as redFlag"),
                // DB::raw('(case when (sellability < 2) then 1 else 0 end) as redFlag'),
                // DB::raw('(
                //     IF(
                //         impact>=3,
                //         IF(
                //             grade>=3,
                //             ((grade - 3) / 2) * (questions.m_p_mult),
                //             ((3 - grade) / 2) * (questions.m_n_mult)
                //         )
                //         ,
                //         0)
                //     )
                //     as valuationEffect'),
                DB::raw(
                    '(
                            IF(
                                questions.type=9,
                                IF(
                                    inputVal > questions.q_dat_1,
                                    questions.q_dat_2,
                                    questions.q_dat_3
                                )
                                ,
                                IF(
                                    impact >=3,
                                    IF(
                                        grade>=3,
                                        ((grade - 3) / 2) * (questions.m_p_mult),
                                        ((3 - grade) / 2) * (questions.m_n_mult)
                                    )
                                    ,
                                    0
                                )
                            )
                        )
                        valuationEffect'
                ),
                DB::raw('( IF(sellability<2, 1, 0)) as redFlag'),
                DB::raw('( IF(sellability>1 && sellability<3 , 1, 0)) as yellowFlag'),

                // '.$this->getValIfArray(3,'questions.id','inputValArray').',
                DB::raw(
                    '(
                            IF(
                                questions.type=7,
                                0,

                                IF(
                                    questions.type=9,
                                    IF(
                                        inputVal > questions.q_dat_1,
                                        1,
                                        0
                                    )
                                    ,
                                    IF(
                                        IF(
                                            impact = 5 &&
                                            sellability > 3.5 &&
                                            sellability < 5,
                                            1,0)
                                        ||
                                        IF(
                                            impact = 5 &&
                                            grade > 3.5 &&
                                            grade < 5,
                                            1,0)
                                        ||
                                        IF(
                                            impact = 4 &&
                                            sellability = 5,
                                            1,0)
                                        ||
                                        IF(
                                            impact = 5 &&
                                            grade = 4,
                                            1,0)
                                        ,
                                        1,
                                        0
                                    )
                                )



                            )
                        )
                        as greenFlag'
                ),







                // DB::raw(
                //     '(
                //         IF(
                //             IF(
                //                 impact = 5 &&
                //                 sellability > 3.5 &&
                //                 sellability < 5,
                //                 1,0)
                //             ||
                //             IF(
                //                 impact = 5 &&
                //                 grade > 3.5 &&
                //                 grade < 5,
                //                 1,0)
                //             ||
                //             IF(
                //                 impact = 4 &&
                //                 sellability = 5,
                //                 1,0)
                //             ||
                //             IF(
                //                 impact = 5 &&
                //                 grade = 4,
                //                 1,0)
                //             ,
                //             1,
                //             0
                //         )
                //     ) as greenFlag'
                // ),
                DB::raw('( IF(
                    IF(
                        impact=5 &&
                        sellability=5,
                        1,0)
                    ||
                    IF(
                        impact=5 &&
                        grade=5,
                        1,0)
                    ,1,0
                )) as purpleFlag'),
                // "blackFlag",
                "qanswers.popUnderComment", ///updated  fofor latest data
                "sectionSummary",
                "confidenceImpactScore",
                "analysisReportComment",
                "valScoreImpactComment",
                "confidenceImpactScoreComment",
                "featured"
            )
            ->orderBy('questions.qset_id', 'asc')
            // ->orderBy('questions.qid', 'asc') //updatd
            ->where('transaction_id', $transaction_id)
            ->where('questions.qset_id', $setId)
            // ->where(function($q) {//updated
            //     $q->where('busstype_id', $this->temp_bussType["id"])
            //       ->orWhere('isGlobal', True);
            // })
            // ->where(function($q) {//updated
            //     $q
            //         ->where('busstype_id',$businessTypeId)
            //         // ->orWhere('isGlobal', True)
            //         ;
            // })
            // ->withPivot('questionQid')
            ->get();



                // dd($transactionQAResult);

        return $transactionQAResult;
    }
}
