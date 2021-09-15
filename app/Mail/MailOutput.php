<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Transaction;
use App\Repositories\TransactionQARepositoryInterface ;
use Illuminate\Http\Request;

class MailOutput extends Mailable
{
    use Queueable, SerializesModels;
    protected $repo_transaction;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $dataemail;

    public function __construct($data, TransactionQARepositoryInterface $repo_transactionQA)
    {
        // //
        // dd($data);
        $this->dataemail=$data;
        // $this->repo_transaction = $repo_transaction;
        $this->repo_transactionQA = $repo_transactionQA;
        // $transaction = $this->repo_transaction->getTransactionById($this->dataemail->transactionId);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        // dd($request);
        // dd($this->dataemail['continueLater']);
        $part =$this->dataemail["part"];
        $markDownEmail = null;

        // dd($this->dataemail->bussinessTypeId);
        // $transaction = $this->repo_transaction->getTransactionById($request->transactionId);
        // $transaction = $this->repo_transaction->getTransactionById($this->dataemail->transactionId);


        // dd($this->dataemail["transactionId"]);


        $transactionQAResult = $this->repo_transactionQA->getFreeQAResult($this->dataemail['transactionId'],$this->dataemail['bussinessTypeId']);
        // dd($transactionQAResult);



        if($this->dataemail['continueLater']==1){
            // dd('this continue later - ',$this->dataemail['continueLater']);
            return $this
                ->from('services@dealflowbrokerage.com', 'Dealflow Brokerage')
                ->subject('Know the Value of Your Business [Continue]')
                ->markdown('emails.continue-free')
                ->with([
                    'dataEmail' => $this->dataemail,
                    'transactionQAResult'=>$transactionQAResult,
                    'request'=> $request
                ]);
        }
        if($this->dataemail['part']==1){
            // dd('this continue later - ',$this->dataemail['continueLater']);
            return $this
                ->from('services@dealflowbrokerage.com', 'Dealflow Brokerage')
                ->subject('Here is Your Estimated Business Valuation')
                ->markdown('emails.outputPart1')
                ->with([
                    'dataEmail' => $this->dataemail,
                    'transactionQAResult'=>$transactionQAResult,
                    'request'=> $request
                ]);
        }
        if($this->dataemail['part']==2){
            // dd('this continue later - ',$this->dataemail['continueLater']);
            return $this
                ->from('services@dealflowbrokerage.com', 'Dealflow Brokerage')
                ->subject('Your Business Valuation is $'.number_format($transactionQAResult["valuationDollar"]))
                ->markdown('emails.outputPart2')
                ->with([
                    'dataEmail' => $this->dataemail,
                    'transactionQAResult'=>$transactionQAResult,
                    'request'=> $request
                ]);
        }
        else{
            // // dd('does not continue later - ',$this->dataemail['continueLater']);
            // // dd($request);
            // return $this->markdown('emails.output')->with([
            //     'dataEmail' => $this->dataemail,
            //     'transactionQAResult'=>$transactionQAResult,
            //     'request'=> $request
            // ]);
        }

        // if($part==1){;

        //     return $this->markdown('emails.continue-free')->with([
        //         'dataEmail' => $this->dataemail,
        //         'transactionQAResult'=>$transactionQAResult,
        //         'request'=> $request
        //     ]);

        // }elseif($part==2){
        //     // $this->markDownEmail = 'emails.output';
        //     return $this->markdown('emails.output')->with([
        //         'dataEmail' => $this->dataemail,
        //         'transactionQAResult'=>$transactionQAResult,
        //         'request'=> $request
        //     ]);
        // }else{
        //     dd();
        // }



    }
}
