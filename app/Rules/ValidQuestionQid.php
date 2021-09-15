<?php

namespace App\Rules;

use App\Busstype;
use App\Question;
use App\Qset;
use Illuminate\Contracts\Validation\Rule;
use DB;

class ValidQuestionQid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    //  protected $paramQsetId;

     protected $paramBussTypeId;
     protected $questionId;
     protected $paramQid;
     protected $old_quetionQid;
     protected $qset;

    // public function __construct($QsetId,$bussTypeId)
    public function __construct($bussTypeId,$questionId,$qId,$old_quetionQid,$qset)  //$bussTypeId,$questionId,$qId,null
    {
        //
        // $this->paramQsetId = $QsetId;
        $this->paramBussTypeId = $bussTypeId;
        $this->questionId = $questionId;
        $this->paramQid = $qId;
        $this->old_quetionQid = $old_quetionQid;
        $this->qset = $qset;

        // dd($this->$qset );
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $qset = $this->qset;
        $bussTypeQIDExisting = DB::table('busstype_question')

        ->where('busstype_id',$this->paramBussTypeId)
        ->join('questions', function ($join) {
                $join->on('busstype_question.question_id', '=', 'questions.id')
                     ->where('questions.qset_id', '=', $this->qset);
            })
        // ->where('busstype_id',$this->paramBussTypeId )
        // ->where('question_id',$this->questionId )
        ->where('questionQid',$this->paramQid)
        ->get();

        if($bussTypeQIDExisting->count()<1){
            return true;
        }else{

        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Question ID is not available';
    }
}
