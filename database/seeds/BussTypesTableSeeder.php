<?php

use Illuminate\Database\Seeder;

class BussTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Busstype::create([
            'name'=>'Saas',
            'initial'=>'S',
            'toolInput'=>3.6,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608733saas.png',
            'info'=>'Software as a Service is a method of software delivery and licensing in which software is accessed online via a subscription, rather than bought and installed on individual computers. '
        ]);
        App\Busstype::create([
            'name'=>'Digital Products',
            'initial'=>'DP',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'/img/business-type-icons/digital-products.svg',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Info Products',
            'initial'=>'IP',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608558amazon_info_products.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Fulfillment by Amazon',
            'initial'=>'FA',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608580amazon_full.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Physical Product eCommerce',
            'initial'=>'E',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608580ecommerce.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Dropship eCommerce',
            'initial'=>'D',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608623dropshipping.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Subscription Business',
            'initial'=>'SB',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608746subscription.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Display Advertising',
            'initial'=>'DA',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608718displayadvertising.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Affiliate',
            'initial'=>'AF',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608580affiliate.png',
        ]);
        App\Busstype::create([
            'name'=>'Services',
            'initial'=>'SVC',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608718services.png',
            'info'=>'Test Info'
        ]);
        App\Busstype::create([
            'name'=>'Forum',
            'initial'=>'SVC',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608580forum.png',
        ]);


        App\Busstype::create([
            'name'=>'Transactional',
            'initial'=>'TM',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'/img/business-type-icons/transactional-marketplace.svg',
        ]);

        App\Busstype::create([
            'name'=>'Lead Gen',
            'initial'=>'LG',
            'toolInput'=>2.2,
            'isActive'=>true,
            'featured'=>'uploads/img/1599608580lead_generation.png',
        ]);
        // App\Busstype::create([
        //     'name'=>'Info Products',
        //     'initial'=>'IP',
        //     'isActive'=>true,
        // ]);

    }
}
