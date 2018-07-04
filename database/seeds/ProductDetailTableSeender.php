<?php

use Illuminate\Database\Seeder;

class ProductDetailTableSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product_detaills = factory(App\Models\ProductDetail::class, 10)->create();
    }
}
