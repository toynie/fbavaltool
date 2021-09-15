<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FbaHelpers;
use App\Repositories\TransactionQARepositoryInterface ;
use App\Repositories\TransactionRepositoryInterface ;
use App\Transaction;
use App\TransactionQA;
use App\bussType;
// use App\Mail\MailOutput;
// use Illuminate\Support\Facades\Mail;


class ApiAnalysisController extends Controller
{

    // model property on class instances
    protected $repo_transactionQA;
    protected $repo_transaction;

    //constructor
    public function __construct(TransactionQARepositoryInterface $repo_transactionQA, TransactionRepositoryInterface $repo_transaction)
    {
        $this->repo_transactionQA = $repo_transactionQA;
        $this->repo_transaction = $repo_transaction;
    }

    //Return all Questions
    public function getOutputAll(Request $request)
    {
        return FbaHelpers::getPaidOutputAll($request->transaction_id);
    }


    public function try(){
        return "fdfd";
    }

    public function getOutputAllRepository(Request $request)
    {

        $transaction = $this->repo_transaction->getTransactionById($request->transactionId);
        $businessTypeId = $transaction->busstype_id;


        $transaction_id=$request->transactionId;

        $transactionQAResult = $this->repo_transactionQA->getFreeQAResult($transaction_id, $businessTypeId);
        return $transactionQAResult;


        $data = [
            'transactionQAResult' => $transactionQAResult
        ];

        return $data ;

    }


    public function getBussTypeFromId($businessTypeId){
       $bussType =  Busstype::findOrFail($businessTypeId);
        return $bussType;
    }

    //Add Question And Answer from Frontend to DB
    public function addQA(Request $request){
       // dd($request->request);
        // dd($request->part);
        // dd($request->ifContuneLater);
        $transactionVoucherCode =  FbaHelpers::generateRandomString();

        // $continueLater = $request->ifContuneLater;

        //Add voucher code to transaction
        $request->request->add(['voucher_code' =>  $transactionVoucherCode ]); //add request



        $part = $request->part;


        $isContinueLater = $request->ifContuneLater;


        // $isContinueLater = $request->ifContuneLater;


        // $businessTypeId = $request->selectedBussTypeId;
        $businessTypeId = $request->busstype_id;

        //--(!)  Get the Bussiness Type Data using the business type Id
        $businessType = $this->getBussTypeFromId($businessTypeId);



        //--(!)  Add the selected Business Type Data in the request
        $request["businesssType"] = $businessType;



        //--(!) Add Transaction to transaction table and get the ID
            $transactionId =  $this->repo_transaction->addQA($request);

        if($transactionId =='error_duplicate'){
            $result = 'error_duplicate';
        }else{
            //--(!)  Make a transaction ID and add it to the request
            $request->transactionId = $transactionId;

            //--(!) Get the Output of the  selected transaction ID
            // $result = $this->getOutputAllRepository($request);
            $result = $this->getOutputFreeRepository($request);
        }


        // $mailData = [
        //     "valuationRange$" =>'test',
        //     'name' => $request->name,
        //     'transactionId'=>$transactionId,
        //     'bussinessTypeId'=>$businessTypeId,
        //     // 'email' => $request->email
        //     'email' => $request->email, //test to send to my email
        //     'part' =>$part,
        //     'continueLater'=>$isContinueLater
        // ];

        // // Send Mail
        // Mail::to($request->email)->send(new MailOutput($mailData,$this->repo_transactionQA));





        if(isset($isContinueLater)){

            if($isContinueLater == 1 || $isContinueLater == 2){
                // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part."&continue=".$isContinueLater);
                // return redirect("/");
                return $transactionId;
            }
            else{
                // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
                // return redirect("/");
                // dd('continue later is '.$isContinueLater);
                // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
                return $transactionId;
            }

        }else{
            // dd('wala continue');
            // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
            return $transactionId;
        }

    }
    //  public function getOutputAllRepository(Request $request)
     public function getOutputFreeRepository(Request $request)
     {

        // dd($request);

         $transaction = $this->repo_transaction->getTransactionById($request->transactionId);


        //get the list of answer if part 2
        $continue_q_a = TransactionQA::where('transaction_id',$request->transactionId)->get();

        // dd($continue_q_a );


        //  dd($transaction);
         $businessTypeId = $transaction->busstype_id;


         $transaction_id=$request->transactionId;


        //  if($transaction_id == "error_duplicate"){
        //     $data = [
        //         'transactionQAResult'=>'',
        //         'error' => 'duplicate'
        //     ];
        //  }



         $transactionQAResult = $this->repo_transactionQA->getFreeQAResult($transaction_id, $businessTypeId);
         return $transactionQAResult;


         $data = [
             'transactionQAResult' => $transactionQAResult,
             'continue_q_a'=>$continue_q_a
         ];
        //  dd($data['continue_q_a']);
         return $data ;

     }

}
