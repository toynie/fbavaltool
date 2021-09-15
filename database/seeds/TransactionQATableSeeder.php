<?php

use Illuminate\Database\Seeder;

class TransactionQATableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Transaction 1
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>2,
            'qanswer_id'=>7,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>3,
            'qanswer_id'=>17,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>4,
            'qanswer_id'=>21,
        ]);
        //Revenue
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>5,
            'qanswer_id'=>null,
            'inputVal'=>10000003,
        ]);
        //Cost of Goods
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>6,
            'qanswer_id'=>null,
            'inputVal'=>0
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>7,
            'qanswer_id'=>43,
            'inputVal'=>.78,
            // 'inputValPercent'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>8,
            'qanswer_id'=>null,
            'inputVal'=>440000,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>9,
            'qanswer_id'=>null,
            'inputVal'=>250000,
        ]);
        //test add same in excel
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>11,
            'inputVal'=>40000,
            // 'qanswer_id'=>139
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>12,
            'qanswer_id'=>56
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>13,
            'qanswer_id'=>62
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>14,
            'qanswer_id'=>68
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>15,
            'qanswer_id'=>80
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>16,
            'qanswer_id'=>88
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>17,
            'qanswer_id'=>92
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>18,
            'qanswer_id'=>98,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>19,
            'qanswer_id'=>104
            // 'inputVal'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>20,
            'qanswer_id'=>110
            // 'inputVal'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>21,
            'qanswer_id'=>117
            // 'inputVal'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>22,
            'qanswer_id'=>122
            // 'inputVal'=>122,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>23,
            'qanswer_id'=>129
            // 'inputVal'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>24,
            'qanswer_id'=>93
            // 'inputVal'=>null,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>25,
            // 'qanswer_id'=>93
            // 'inputVal'=>null,
            'inputValArray'=>[
                "2",
                "40",
                "26",
                "34",
                "62",
                "89",
                "76"
            ],
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>26,
            'qanswer_id'=>100,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>27,
            'qanswer_id'=>107,
        ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>1,
        //     'question_id'=>28,
        //     'qanswer_id'=>118,
        // ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>28,
            'qanswer_id'=>null,
            'inputVal'=>0,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>30,
            'qanswer_id'=>146,

        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>41,
            'qanswer_id'=>114
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>45,
            'qanswer_id'=>116,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>46,
            'qanswer_id'=>119,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>49,
            'qanswer_id'=>123,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>52,
            'qanswer_id'=>null,
            // 'inputValArray'=>json_encode([
            //     127=>0,
            //     128=>0,
            //     129=>0,
            //     130=>80,
            //     131=>0,
            //     132=>0,
            //     133=>0,
            //     ]),
            'inputValArray'=>[
                "2",
                "40",
                "26",
                "34",
                "62",
                "89",
                "76"
            ],
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>57,
            'qanswer_id'=>134,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>1,
            'question_id'=>32,
            'inputVal'=>1002,

        ]);

          // Transaction 1
        // App\TransactionQA::create([
        //     'transaction_id'=>2,
        //     'question_id'=>19,
        //     'qanswer_id'=>64,
        // ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>2,
        //     'question_id'=>20,
        //     'qanswer_id'=>64,
        // ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>2,
        //     'question_id'=>21,
        //     'qanswer_id'=>null,

        //     'inputValArray'=>json_encode([
        //         136=>0,
        //         137=>15,
        //         138=>80,
        //         139=>0,
        //         140=>20,
        //         141=>5,
        //         142=>0,
        //         ]),
        // ]);

        // //Additional Transactions
        // App\TransactionQA::create([
        //     'transaction_id'=>1,
        //     'question_id'=>23,
        //     'qanswer_id'=>151,
        // ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>1,
        //     'question_id'=>24,
        //     'qanswer_id'=>156,
        // ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>1,
        //     'question_id'=>1,
        //     'qanswer_id'=>1,
        // ]);
        App\TransactionQA::create([
            'transaction_id'=>2,
            'question_id'=>1,
            'qanswer_id'=>3,
        ]);
        // App\TransactionQA::create([
        //     'transaction_id'=>2,
        //     'question_id'=>6,
        //     'qanswer_id'=>null,
        //     'inputVal'=>350000,
        // ]);
        App\TransactionQA::create([
            'transaction_id'=>2,
            'question_id'=>7,
            'qanswer_id'=>null,
            'inputVal'=>15000
        ]);
        App\TransactionQA::create([
            'transaction_id'=>2,
            'question_id'=>8,
            'qanswer_id'=>null,
            'inputVal'=>300000,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>2,
            'question_id'=>9,
            'qanswer_id'=>null,
            'inputVal'=>120000,
        ]);
        App\TransactionQA::create([
            'transaction_id'=>2,
            'question_id'=>10,
            'qanswer_id'=>null,
            'inputVal'=>16000,
        ]);
    }
}
