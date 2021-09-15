<?php

namespace App\Http\Controllers;

use App\Busstype;
use App\Setting;
use App\Qanswer;
use App\Qset;
use App\Question;
use App\TransactionQA;
use App\Repositories\TransactionQARepositoryInterface ;
use App\Repositories\TransactionRepositoryInterface ;
use App\Repositories\BussTypeRepositoryInterface ;
use FbaHelpers;
use Illuminate\Http\Request;
use App\Mail\MailOutput;
use Illuminate\Support\Facades\Mail;

class AnalysisController extends Controller
{

   // model property on class instances
   protected $repo_transactionQA;
   protected $repo_transaction;
   protected  $repo_bussType;

   //constructor
   public function __construct(TransactionQARepositoryInterface $repo_transactionQA, TransactionRepositoryInterface $repo_transaction , BussTypeRepositoryInterface $repo_bussType)
   {
       $this->repo_transactionQA = $repo_transactionQA;
       $this->repo_transaction = $repo_transaction;
       $this->repo_bussType = $repo_bussType;
   }


//    test show free question using php only
   public function freequestions(){
        $businessTypeId = $request->selectedBussTypeId;

        //--(!)  Get the Bussiness Type Data using the business type Id
        $businessType = $this->getBussTypeFromId($businessTypeId);

        //--(!)  Add the selected Business Type Data in the request
        $request["businesssType"] = $businessType;

        //--(!) Add Transaction to transaction table and get the ID
        $transactionId =  $this->repo_transaction->addQA($request);
        // $transactionId =  1; //--test

        //--(!)  Make a transaction ID and add it to the request
        $request->transactionId = $transactionId;

        //--(!) Get the Output of the  selected transaction ID
        // --Problem getting the
        $result = $this->getOutputAllRepository($request);


        // dd( $result);
        // return redirect('/frontend/free-output?transactionId='.$transactionId)->with('freeOutput', $result);
        return redirect('/frontend/free-output?transactionId='.$transactionId);
   }

   public function getTransactionQA(Request $request)
   {

    //    $a =  $this->repo_bussType->get($request->transactionId);
    //  dd($request );

        // $busstype =$this->repo_bussType->get($request->transactionId);
        $transaction = $this->repo_transaction->getTransactionById($request->transactionId);
        $busstypeId = $transaction->busstype_id;
        // dd($busstypeId);

       $transaction_id=$request->transactionId;
       $transactionQAResult = $this->repo_transactionQA->getFreeQAResult($transaction_id,$busstypeId);

    //    $data = [
    //        'transactionQAResult' => $transactionQAResult
    //    ];
        $data = $transactionQAResult;

       return view('admin.qa.index',compact('data'));
    //    return $data ;
   }

    public function getOutputAll(Request $request)
    {
        // dd($request->request);
        $paidOutputResult = FbaHelpers::getPaidOutputAll($request->transactionId);
        return view('admin.qa.index',compact('paidOutputResult'));
    }

    public function getBusinessTypes(Request $request)
    {
        return view('frontend.select_business');
    }

    public function getBussTypeFromId($businessTypeId){
        $bussType =  Busstype::findOrFail($businessTypeId);
         return $bussType;
     }


     public function showFreeOutput(Request $request)
     {

        // dd($request);
        $result = $this->getOutputFreeRepository($request);


        return view('frontend.freeOutput',compact('result'));

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


        $mailData = [
            "valuationRange$" =>'test',
            'name' => $request->name,
            'transactionId'=>$transactionId,
            'bussinessTypeId'=>$businessTypeId,
            // 'email' => $request->email
            'email' => $request->email, //test to send to my email
            'part' =>$part,
            'continueLater'=>$isContinueLater
        ];

        // Send Mail
        Mail::to($request->email)->send(new MailOutput($mailData,$this->repo_transactionQA));


        // return redirect('/frontend/free-output?transactionId='.$transactionId)->with('freeOutput', $result);

        // return view('frontend.freeOutput',compact('result'));
        // http://fbavaltool.com/freeOutput?transactionId=34
        //  redirect('/freeOutput?transactionId='.$transactionId);

        // return redirect('/freeOutput?transactionId='.$transactionId);
        // return redirect('/freeOutput?transactionId='.$transactionId).'part='.$part;
        if(isset($isContinueLater)){
            if($isContinueLater == 1 || $isContinueLater == 2){
                // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part."&continue=".$isContinueLater);
                return redirect("/");
            }
            else{
                // return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
                // return redirect("/");
                // dd('continue later is '.$isContinueLater);
                return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
            }

        }else{
            // dd('wala continue');
            return redirect("/freeOutput?transactionId=".$transactionId."&part=".$part);
        }

    }


    public function continueLater(Request $request){
        // dd($request);
        dd('continue later');
    }


}
