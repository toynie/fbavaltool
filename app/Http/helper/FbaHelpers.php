<?php

use App\Question;
use App\Qset;
use App\Qanswer;
use App\Transaction;
use App\TransactionQA;
use App\Setting;

class FbaHelpers
{

    //*-------------Basic Get Data------------*//





    //====>***Sets****//

    //Get all Set
    public static function getAllQuestionSet()
    {
        $qsets =  Qset::orderBy('id', 'asc')->get();
        return $qsets;
    }

    //Get Set Name By ID
    public static function getSetNameById($id)
    {
        $qset =  Qset::findOrFail($id);
        return $qset->name;
    }


    //====>***Questions****//

    //Get all Question By Set ID
    public static function getQuestionByType($qSetId)
    {
        $questions = Question::orderBy('qid')->where('qset_id', '=', $qSetId)->get();
        return $questions;
    }

    //Get all Question Details By ID
    public static function getQuestionByID($qId)
    {
        $questions = Question::findOrFail($qId);
        return $questions;
    }

    //Get All Free Questions
    public static function getFreeQuestions()
    {
        $freeQuestions =  Question::orderBy('qset_id', 'asc')->where('isFree', '=', '1')->get();
        return $freeQuestions;
    }

    //Get Free Questions By Set
    public static function getFreeQuestionsById($qSetId)
    {
        $freeQuestions =  Question::orderBy('qset_id', 'asc')->where('isFree', '=', '1')->where('qset_id', '=', $qSetId)->get();
        return $freeQuestions;
    }

    //====>***Answer****//

    //Get All Answer By Question ID
    public static function getAnswerByQuestionID($id)
    {
        // $id=42;
        $answers = Qanswer::orderBy('question_id')->where('id', '=', $id)->get();
        // dd($answers );
        return $answers;
    }

    //Get Answer Details
    public static function getAnswerDetailsById($id)
    {
        $answer = Qanswer::findOrFail($id);
        return $answer;
    }

    //Get Answer Details By QA details
    public static function getInputAnswerDetailsByQA($qa)
    {
        // dd($qa);
        if ($qa->qanswer_id != null) {
            $answer = Qanswer::findOrFail($qa->qanswer_id)->userInput;
            // $answer = $answer;
        } elseif ($qa->inputVal != null) {
            $answer = $qa->inputVal;
            // $answer = '2';
        } elseif ($qa->inputValArray != null) {
            $answer = $qa->inputValArray;
            // $answer = '2';
        }
        return $answer;
    }



    //====>***TRANSACTIONS****//

    //Get All Transactions
    public static function getTransactions()
    {
        $transactions =  Transaction::get();
        return $transactions;
    }


    //====>***TRANSACTIONS QA****//

    //Get Answer of Question By ID

    public static function getQuestionWithArrayValue(){
        return  Question::where('isFree',True)->where('type',7)->get();
    }

    public static function getQATransations()
    {
        $QATransactions = TransactionQA::all();
        dd($QATransactions);
        return $QATransactions;
    }

    //Get Answer of Question By ID
    public static function getQAResponse($questinId, $QATransationId)
    {

        $QAResult = TransactionQA::where('question_id', '=', $questinId)
            ->where('transaction_id', '=', $QATransationId)
            ->select('transaction_id', 'question_id', 'qanswer_id', 'inputVal', 'inputValArray')
            ->get()->toArray();

        if (count($QAResult) > 0) {
            return $QAResult =  $QAResult;
        } else {
            $QAResult =  null;
        }
        // return $QAResult;
    }

    //Get Answer Name from Question Id
    public static function getAnswerNameFromAnswerID($questinId)
    {
        $QAResult = TransactionQA::select("qanswer_id")->where('question_id', '=', $questinId)->get(); //find($questinId)->select("qanswer_id");
        $QAResult = $QAResult[0]["qanswer_id"];
        return $QAResult;
    }

    //Get Answer pr0perty by ID
    public static function getAnswerPropertyById($id)
    {
        $QAResult = Qanswer::where('id', '=', $id)
        ->get()->toArray();

        return $QAResult;
    }


    public static function getGrandTotalFlags($color)
    {
        switch ($color) {
            case 'redYellow':
            default:
        }
    }

    //*-------------Data Convertions------------*//

    //Get Valuation of each answer
    public static function getAnswerValuation($mpm, $mnm, $grade, $impact)
    {
        if ($impact >= 3) {
            if ($grade >= 3) {
                return (($grade - 3) / 2) * ($mpm);
            } else {
                return ((3 - $grade) / 2) * ($mnm);
            }
        } else {
            return 0;
        }
    }

    public static function getValuationRangePercent(){
        $valRangePercent = 0;
        $valRangePercent =  Setting::where('name',  'valuation_range')->pluck('value');

        return  $valRangePercent[0];
    }

    public static function confidenceBase(){
        $confidenceBase = 0;
        $confidenceBase =  Setting::where('name',  'confidenceBase')->pluck('value');

        return  $confidenceBase[0];
    }



    public static function getNetProfit($transactionId)
    {




        $netProfit = 0;
        $totalRevenue = Setting::where('name',  'total_revenue_12_months')->pluck('value');
        $totalGoodSold = Setting::where('name',  'total_cost_goods_sold_12_months')->pluck('value');
        // $totalOperatingExpense = Setting::where('name',  'total_cost_goods_sold_12_months')->pluck('value');
        $totalOperatingExpense = Setting::where('name',  'total_operating_expense_12_months')->pluck('value');


        // dd($totalRevenue[0] );
        // dd($totalOperatingExpense );



        $netProfit =
        FbaHelpers::getQAResponse((float)$totalRevenue[0],$transactionId)[0]["inputVal"] -
        FbaHelpers::getQAResponse((float)$totalGoodSold[0], $transactionId)[0]["inputVal"] -
        FbaHelpers::getQAResponse((float)$totalOperatingExpense[0], $transactionId)[0]["inputVal"];

        // dd(FbaHelpers::getQAResponse((float)$totalOperatingExpense[0], $transactionId)[0]["inputVal"]);

        return($netProfit);
    }

    //For Paid Output Specific Question
    public static function getPaidOutputSpecificQuestion($transactionId, $setId)
    {
        //Static Id of Question of Base Valuation Multiple  --> update later
        $baseValuationMultipleQuestionId = 1;

        $questions = Question::orderBy('qid')
            ->Where('qset_id', '=', $setId)->get();

        $analysis = array();

        foreach ($questions as $key => $question) {

            $toPush = [
                // "qid" => $question->id,
                "id" => $question->id,
                "qid" => $question->qid,
                "qname" => $question->name,
                "qsetId" => $question->qset_id,
                "qsetName" => FbaHelpers::getSetNameById($question->qset_id),
                "qtype" => $question->type,
                "isFree" => $question->isFree,
                "answerSelect" => null,
                "answerVal" => null,
                "answerMulti" => null,

            ];

            $answer = FbaHelpers::getQAResponse($question->id, $transactionId);

            if ($question->type == 1) {
                // $answerId = FbaHelpers::getQAResponse($question->id, $transactionId);

                if ($answer != null) {
                    // dd($answerId);
                    $toPush["answerSelect"] = array(

                        "answerId" => $answer[0]["qanswer_id"],
                        "userInput" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->userInput,
                        // "userInput" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId))[0]->userInput,
                        "toolInput" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->toolInput,
                        "redFlag" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->redFlag,
                        "yellowFlag" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->yellowFlag,
                        "greenFlag" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->greenFlag,
                        "purpleFlag" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->purpleFlag,
                        "blackFlag" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->blackFlag,
                        "grade" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->grade,
                        "impact" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->impact,
                        "sellability" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->sellability,
                        "confidenceImpactScore" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->confidenceImpactScore ?? 0,
                        "confidenceImpactComment" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->confidenceImpactScoreComment ?? null,
                        "valScoreImpactComment" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->valScoreImpactComment ?? null,
                        "qsetId" => $question->qset_id,
                        "qIdBySet" => $question->qid,
                        "mpm" => $question->m_p_mult,
                        "mnm" => $question->m_n_mult,
                        "valuationEffect" => FbaHelpers::getAnswerValuation(
                            $question->m_p_mult,
                            $question->m_n_mult,
                            FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'] ?
                                FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->grade : 0,
                            FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'] ?
                                FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($question->id, $transactionId)[0]['qanswer_id'])[0]->impact : 0
                        ),
                    );
                }
            }

            //Value
            elseif ($question->type == 2) {
                // $answer = FbaHelpers::getQAResponse($question->id, $transactionId);
                if ($answer != null) {
                    $toPush["answerVal"] = array(
                        "value" => $answer[0]["inputVal"],

                    );
                }

                //Multi Select
            } elseif ($question->type == 3) {

                if ($answer != null ) {
                    $arrVal = json_decode($answer[0]["inputValArray"]);
                    // dd($arrVal );
                    // print_r($arrVal );
                    $toAnswerArrVal=[];
                    foreach($arrVal as  $toAnsswerArrValKey => $toAnsswerArrValValue){
                        array_push($toAnswerArrVal, [
                            'answer'=> $toAnsswerArrValValue,
                            'properties'=>FbaHelpers::getAnswerPropertyById($toAnsswerArrValKey)[0],]
                        );
                        // print($toAnsswerArrValKey .'<br>');
                    }

                    $toPush["answerMulti"] = array(
                        // "value" => $answer[0]["inputValArray"],
                        "value" => $toAnswerArrVal,
                    );
                }
            }


            array_push($analysis, $toPush);
        }

        $totalMultiplierEffect = 0;
        $totalRedFlags  = 0;
        $totalYellowFlags  = 0;
        $totalGreenFlags  = 0;
        $totalPurpleFlags  = 0;
        $totalBlackFlags  = 0;
        $totalConfidenceScore  = 0;

        foreach ($analysis as  $data) {

            if ($data['answerSelect']) {
                // $totalRedFlags  = $data['qid'];
                $totalRedFlags  += $data['answerSelect']['redFlag'];
                $totalYellowFlags  += $data['answerSelect']['yellowFlag'];
                $totalGreenFlags  += $data['answerSelect']['greenFlag'];
                $totalPurpleFlags  += $data['answerSelect']['purpleFlag'];
                $totalBlackFlags  += $data['answerSelect']['blackFlag'];
                $totalMultiplierEffect += $data['answerSelect']['valuationEffect'];
                $totalConfidenceScore += $data['answerSelect']['confidenceImpactScore'];
            }
            $toPush['totalRedFlags'] = $totalRedFlags;
        }

        // return json_decode(json_encode($analysis));
        $analysis = array(
            'data' => json_decode(json_encode($analysis)),
            'total' => array(
                'totalRedFlags'  => $totalRedFlags,
                'totalYellowFlags'  => $totalYellowFlags,
                'totalGreenFlags'  => $totalGreenFlags,
                'totalPurpleFlags'  => $totalPurpleFlags,
                'totalBlackFlags'  => $totalBlackFlags,
                'totalMultiplierEffect' => $totalMultiplierEffect,
                'totalConfidenceImpactScore' => $totalConfidenceScore,
            )
        );
        return $analysis;
    }

    //Final Paid Output
    public static function getPaidOutputAll($sampleTransactionId)
    {
        $analysis = array();
        $idBusinessModelQuestion = 1;

        $sets = array();

        foreach (FbaHelpers::getAllQuestionSet() as $set) {

            array_push(
                $sets,
                array(
                    "setInfo" => array(
                        "id" => $set->id,
                        "setName" => $set->name
                    ),
                    "data" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['data'],
                    // "total"=>FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId,$set->id)['total'],
                    "totalRedFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalRedFlags'],
                    "totalYellowFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalYellowFlags'],
                    "totalGreenFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalGreenFlags'],
                    "totalPurpleFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalPurpleFlags'],
                    "totalBlackFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalBlackFlags'],
                    "totalBlackFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalBlackFlags'],
                    "totalBlackFlags" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalBlackFlags'],
                    "totalMultiplierEffect" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalMultiplierEffect'],
                    "totalConfidenceImpactScore" => FbaHelpers::getPaidOutputSpecificQuestion($sampleTransactionId, $set->id)['total']['totalConfidenceImpactScore'],
                )
            );
        }

        $analysis['sets'] = $sets;
        $baseMultiplier = FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($idBusinessModelQuestion, $sampleTransactionId)[0]['qanswer_id'])[0]->toolInput;

        $netProfit = FbaHelpers::getNetProfit($sampleTransactionId);
        $valuationMultiplier =array_sum(array_column($sets, 'totalMultiplierEffect')) + $baseMultiplier ;
        $valuation = $netProfit * $valuationMultiplier;
        $valuationPercent = Setting::where('id', 5)->pluck('value')[0];
        $valuationRangePrice1 = ($valuation-($valuationPercent * ($valuation/100)) *-1);
        $valuationRangePrice2 = ($valuation+($valuationPercent * ($valuation/100)) *-1);
        $valuationRangePriceConCat = "$".$valuationRangePrice1 . " - $"."$".$valuationRangePrice1  ;

        $analysis['info'] = array(
            "businessName" => '',
            "businessModel" => FbaHelpers::getAnswerByQuestionID(FbaHelpers::getQAResponse($idBusinessModelQuestion, $sampleTransactionId)[0]['qanswer_id'])[0]->userInput,
            "baseValMultiple" => $baseMultiplier,
            "netProfit"=>$netProfit,
            "grandTotalMultiplierEffect" => array_sum(array_column($sets, 'totalMultiplierEffect')),
            "valuationMultiplier"=>$valuationMultiplier,
            "valuation"=>$valuation,
            "valuationRangePercent"=>$valuationPercent,
            // "valuationRangePrice"=>"$".$valuationRangePrice1 . " - $".$valuationRangePrice2 ,
            "valuationRangePrice1" => $valuationRangePrice1 ,
            "valuationRangePrice2" => $valuationRangePrice2,

            "grandTotalRedYellow" => array_sum(array_column($sets, 'totalRedFlags'))  +  array_sum(array_column($sets, 'totalYellowFlags')),
            "grandTotalGreenPurple" => array_sum(array_column($sets, 'totalGreenFlags'))  +  array_sum(array_column($sets, 'totalPurpleFlags')),
            "grandTotalBlack" => array_sum(array_column($sets, 'totalBlackFlags'))
        );

        return $analysis;

    }

        //Return list of business type
        public static function getSettingsVal()
        {
            $id = 6;
            //GetBusinessTypeQuestionID
            $busssTypeId = Setting::orderBy('id', 'asc')->where('id',$id)->pluck('value','name');

            return $busssTypeId["business_type_question"];

        }




        //Create Random unique String
        // public static function getPaidOutputAll($sampleTransactionId)
        public  static function generateRandomString($length = 12) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
}
