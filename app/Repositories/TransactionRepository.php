<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionQA;
use DB;
use App\Mail\MailOutput;
use Illuminate\Support\Facades\Mail;

class TransactionRepository implements TransactionRepositoryInterface
{

    protected $transaction;
    protected $transactionQA;

    public function __construct(Transaction $model, TransactionQARepository $model2 )
    {
        $this->transaction = $model;
        $this->transactionQA = $model2;
    }

    public function getTransactionById($id){
       $transaction = Transaction::findOrFail($id);

        return $transaction ;
    }


    public function addQA(Request $request)
    {


        // Create user
        $busstypeData = $request->businesssType;
        $isContinueLater = $request->ifContuneLater;

        // dd($request->request);



        if (!isset($request->transactionId)) {
            try{
                $id = Transaction::insertGetId([
                    'name' => $request->name,
                    'email' => $request->email,
                    'website' => $request->website,
                    'voucher_code'=>$request->voucher_code,
                    // 'whyValuate' => json_encode($request->whyValuate),
                    'whyValuate' => $request->whyValuate,
                    'busstype_id'=>$request->businesssType->id,
                    'part'=>2,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);

            }
            catch (\Illuminate\Database\QueryException $e){
                // dd($e);
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    //return the data with current email
                    // $currentTransaction = Transaction::where('email',$request->email)->get();
                    // $id=$currentTransaction[0]->id;

                    return 'error_duplicate';
                }
            }
        } else {
            # code...

            try{
                Transaction::where('id',$request->transactionId)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'website' => $request->website,
                    'voucher_code'=>$request->voucher_code,
                    // 'whyValuate' => json_encode($request->whyValuate),
                    'whyValuate' => $request->whyValuate,
                    'busstype_id'=>$request->businesssType->id,
                    'part'=>$request->part,
                    // 'created_at'=>now(),
                    'updated_at'=>now()
                ]);
                $id = $request->transactionId;

            }
            catch (\Illuminate\Database\QueryException $e){
                dd($e->errorInfo);
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    //return the data with current email
                    // $currentTransaction = Transaction::where('email',$request->email)->get();
                    // $id=$currentTransaction[0]->id;

                    return 'error_duplicate';
                }
            }
        }







        // make email
        // Mail::to($request->email)->send(new MailOutput());

        // dd($request->request);


        TransactionQA::where('transaction_id', $request->transactionId)->delete();

        foreach ($request->request as $key =>  $transaction) {



            if ($key < 1) continue;
            // dd($request->request);
            // dd('fdfd');

            $qExplode = explode("-", $key);

            $qId = $qExplode[0];  //Question ID

            $qType = $qExplode[1];  //Question Type

            $qanswer_id = null;

            $inputVal = null;
            $inputValArray = null;
            $inputValArray = null;
            $checkBox = null;

            switch ($qType) {
                // case 1:
                //     # code...
                //     $qanswer_id = $transaction;
                //     break;
                // case 2:
                //     # code...
                //     $inputVal = $transaction;
                //     break;
                // case 3:
                //     # code...
                //     $inputValArray = $transaction;
                //     break;
                // case 4:
                //     # code...
                //     $checkBox =  json_encode($transaction);
                //     // $checkBox=  'fdfdfdfd' ;

                //     // dd($checkBox);


                case 1:
                    # code...
                    $qanswer_id = $transaction;
                    break;
                case 2:
                    # code...
                    $qanswer_id = $transaction;
                    break;
                case 3:
                    # code...
                    $qanswer_id = $transaction;
                    break;
                // case 4:
                //     # code...
                //     $inputVal = $transaction;
                //     break;
                case 5:
                    # code...
                    // dd( $transaction);
                    $inputVal = $transaction;
                    break;
                // case 6:
                //     # code...
                //     $inputVal = $transaction;
                //     break;
                // case 7:
                //     # code...
                //     $inputValArray = $transaction;
                //     break;
                // case 8:
                //     # code...
                //     $checkBox =  json_encode($transaction);
                //     break;
                case 6:
                    # code...
                    $checkBox =  json_encode($transaction);
                    break;
                case 7:
                    # code...
                    // dd($transaction);
                    $inputValArray = json_encode($transaction);
                    // dd($inputValArray);
                    break;
                // case 8:
                //     # code...
                //     $checkBox =  json_encode($transaction);
                //     break;



                default:
                    # code...
                    break;
            }



            $transactionQAId= TransactionQA::insertGetId([
                'transaction_id' => $id,
                'question_id' => $qId,
                'qanswer_id' => $qanswer_id,
                'inputVal' => $inputVal,
                'inputValArray' => $inputValArray,
                'checkBox' => $checkBox,
            ]);


            // if (!isset($request->transactionId)) {
            //     # code...
            //     $transactionQAId= TransactionQA::insertGetId([
            //         'transaction_id' => $id,
            //         'question_id' => $qId,
            //         'qanswer_id' => $qanswer_id,
            //         'inputVal' => $inputVal,
            //         'inputValArray' => $inputValArray,
            //         'checkBox' => $checkBox,
            //     ]);
            //     // dd('added new qa');
            // } else {

            //     # code...
            //     $transactionQAId= TransactionQA::where('transaction_id',$request->transactionId)->update([
            //         'transaction_id' => $request->transactionId,
            //         'question_id' => $qId,
            //         'qanswer_id' => $qanswer_id,
            //         'inputVal' => $inputVal,
            //         'inputValArray' => $inputValArray,
            //         'checkBox' => $checkBox,
            //     ]);
            // }






        }


        // $currentTransation = Transaction::findOrFail($id);

        // dd($request);


        // $fetchTransactionQA = $this->transactionQA->getFreeQAResult($id,$request->selectedBussTypeId);
        $fetchTransactionQA = $this->transactionQA->getFreeQAResult($id,$request->busstype_id);



        return $id;
    }
}
