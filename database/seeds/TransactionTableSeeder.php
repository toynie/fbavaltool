<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Transaction::create([
            'id'=>1,
            'voucher_code'=>'maTXVVRBoNFn',
            'name'=>'alexies iglesia',
            'busstype_id'=>3,
            'email'=>'ialexies@gmail.com',
            'contact'=>'0945500092',
            // 'whyValuate'=>'{"2":"on","3":"on","5":"on"}',
            'whyValuate'=>1,
            'part'=>2
        ]);
        App\Transaction::create([
            'id'=>2,
            'voucher_code'=>'Tf5SxmytpQNI',
            'name'=>'Charity iglesia',
            'busstype_id'=>1,
            'email'=>'charity@gmail.com',
            'whyValuate'=>2,
            'part'=>2
        ]);

    }
}
