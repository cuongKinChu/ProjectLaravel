<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include("./config/productInfo/productDefault.php");
        foreach ($data as $key) {
            DB::table('products')->insert([
                'product_name' => $key['product_name'],
                'price' => $key['price'],
                'description' => $key['description'],
            ]);
        }
    }
}
