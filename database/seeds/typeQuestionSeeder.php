<?php

use Illuminate\Database\Seeder;
use App\BussType;


class TypeQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('busstype_question')->insert([
        //     'bussType_id'=>1,
        //     'question_id'=>1,
        // ]);
        // DB::table('busstype_question')->insert([
        //     'bussType_id'=>1,
        //     'question_id'=>2,
        // ]);
        // DB::table('busstype_question')->insert([
        //     'bussType_id'=>1,
        //     'question_id'=>3,
        // ]) ;



        // $data_bussTypesSaas = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47];

        $data_bussTypesSaas =[];
        for ($x = 1; $x <= 71; $x++) {
            array_push($data_bussTypesSaas,$x);
        }

        $bussType = 3;


            foreach ($data_bussTypesSaas  as $key => $dat) {

                DB::table('busstype_question')->insert([
                    'busstype_id'=>$bussType,
                    'question_id'=>$dat,
                    'questionQid'=>$dat
                ]);
            }


        $data_bussTypesSaas = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39];
        $bussType = 2;

            foreach ($data_bussTypesSaas  as $key => $dat) {

                DB::table('busstype_question')->insert([
                    'busstype_id'=>$bussType,
                    'question_id'=>$dat,
                    'questionQid'=>$dat,
                    'useCustomAnswer'=>True,
                    // 'customAnswer'=>$dat
                ]);
            }

            $data_bussTypesSaas = [1,2,3,4,5,6,7,8,9,10,11,12,13];
            // $bussType = 3;
            // foreach ($data_bussTypesSaas  as $key => $dat) {

            //     DB::table('busstype_question')->insert([
            //         'busstype_id'=>$bussType,
            //         'question_id'=>$dat,
            //         'questionQid'=>$dat,
            //         'useCustomAnswer'=>True,
            //         // 'customAnswer'=>$dat
            //     ]);
            // }



        // $bussType =  BussType::findOrFail(1);
        // $bussType->questions()->sync([
        //     1,2,3,4,5,6,7,8,9,10,11,12,
        //     13
        // ]);
    }
}
