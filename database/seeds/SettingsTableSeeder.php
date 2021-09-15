<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Setting::create([
            'name'=>'project_aronym',
            'value'=>'S',
        ]);
        App\Setting::create([
            'name'=>'total_revenue_12_months',
            'value'=>5,
        ]);
        App\Setting::create([
            'name'=>'total_cost_goods_sold_12_months',
            'value'=>6,
        ]);
        App\Setting::create([
            'name'=>'total_operating_expense_12_months',
            'value'=>8,
        ]);





        App\Setting::create([
            'name'=>'total_gross_margin',
            'value'=>7,
        ]);
        App\Setting::create([
            'name'=>'total_owners_drawings',
            'value'=>9,
        ]);
        App\Setting::create([
            'name'=>'total_unrelated_unnecessary_expense',
            'value'=>11,
        ]);





        App\Setting::create([
            'name'=>'valuation_range',
            'value'=>10,
        ]);
        App\Setting::create([
            'name'=>'business_type_question',
            'value'=>1,
        ]);
        App\Setting::create([
            'name'=>'confidenceBase',
            'value'=>.40,
        ]);
        App\Setting::create([
            'name'=>'traffic_source',
            // 'value'=>52,
            'value'=>37,
        ]);
    }
}
