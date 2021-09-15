<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIconsForBusinessTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $digitalProducts = \App\BussType::where('initial', 'DP')->first();
        $digitalServices = \App\BussType::where('name', 'Digital Services')->first();
        $marketplace = \App\BussType::where('initial', 'TM')->first();

//        $digitalProducts->featured = '/img/business-type-icons/digital-products.svg';
//        $digitalProducts->save();
//
//        $digitalServices->featured = '/img/business-type-icons/digital-services.svg';
//        $digitalServices->save();
//
//        $marketplace->featured = '/img/business-type-icons/transactional-marketplace.svg';
//        $marketplace->save();

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
