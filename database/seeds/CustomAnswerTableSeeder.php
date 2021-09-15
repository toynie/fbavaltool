<?php

use Illuminate\Database\Seeder;

class CustomAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\CustomAnwer::create([
            'question_id'=>1,
            'busstype_id'=>2,
            'business_question_id'=>14,
            'userInput'=>'100% B2B',
            'toolInput'=>'100% B2B',
            'grade'=> 5,
            'impact'=> 5,
            'sellability'=> 5
        ]);
        App\CustomAnwer::create([
            'question_id'=>1,
            'busstype_id'=>2,
            'business_question_id'=>14,
            'userInput'=>'Test Answer',
            'toolInput'=>'Test Anser',
            'grade'=> 3,
            'impact'=> 3,
            'sellability'=> 3
        ]);
    }
}
