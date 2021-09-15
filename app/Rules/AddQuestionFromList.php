<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AddQuestionFromList implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $paramQuestionId;
    protected $paramBusinessTypeId;

    public function __construct($paramBusinessTypeId, $paramQuestionId)
    {
        //
        $this->paramQuestionId = $paramQuestionId;
        $this->paramBusinessTypeId = $paramBusinessTypeId;
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
        $bussTypeQIDExisting = DB::table('busstype_question')->where('questionQid',$this->parambussTypeId)->get();
  
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
        return 'The validation error message.';
    }
}
