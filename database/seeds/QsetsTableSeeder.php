<?php

use Illuminate\Database\Seeder;

class QsetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // App\Qset::create([
        //     'name'=>'Business Type',
        //     'slug'=>'business-type',
        //     // 'model'=> 'S.1',
        //     'id'=>1
        // ]);
        App\Qset::create([
            'name'=>'General',
            'slug'=>'general',
            // 'model'=> 'S.2',
            'id'=>2
        ]);
        App\Qset::create([
            'name'=>'Performance',
            'slug'=>'performance',
            // 'model'=> 'S.3',
            'id'=>3
        ]);
        App\Qset::create([
            'name'=>'Sustainability',
            'slug'=>'sustainability',
            // 'model'=> 'S.6',
            'id'=>4
        ]);
        App\Qset::create([
            'name'=>'Defensibility',
            'slug'=>'defensibility',
            // 'model'=> 'S.7',
            'id'=>5
        ]);
        App\Qset::create([
            'name'=>'Scalability',
            'slug'=>'scalability',
            // 'model'=> 'S.8',
            'id'=>6
        ]);

        App\Qset::create([
            'name'=>'Transferability',
            'slug'=>'transferability',
            // 'model'=> 'S.4',
            'id'=>7
        ]);
        App\Qset::create([
            'name'=>'Auditability',
            'slug'=>'aidtability',
            // 'model'=> 'S.5',
            'id'=>8
        ]);



    }
}
