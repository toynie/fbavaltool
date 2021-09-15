<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

use DB;

class ValidQuestionId implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $paramBussTypeId;
     protected $paramQuestionId;


    public function __construct($bussTypeId,$questionId)
    {
        //
        $this->paramBussTypeId = $bussTypeId;
        $this->paramQuestionId = $questionId;
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
        //
        
        $bussTypeQIDExisting = DB::table('busstype_question')

        ->where('busstype_id',$this->paramBussTypeId)
        ->where('question_id',$this->paramQuestionId)
        // ->where('questionQid',$this->paramQid)
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
        return 'Question Already Exist';
    }
}
