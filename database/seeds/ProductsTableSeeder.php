<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        factory(Product::class, 5)->create()->each(function ($product_id)
        {
            $product_id->product_detail()->save(factory(ProductDetail::class)->make());
        });

 
     
    }
}
 