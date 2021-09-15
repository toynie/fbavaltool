<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeBusinessTypeNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $business = \App\BussType::where('initial', 'TM')->first();
        if ($business) {
            $business->name = 'Transactional';
            $business->save();
        }

        $business = \App\BussType::where('initial', 'SVC')->first();
        if ($business) {
            $business->name = 'Digital Services';
            $business->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
