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
        DB::table('products')->insert([
            [ 'product_name' => 'Milk tea star', 'image' => 'milk-tea-start.jpg','price' => 29000, 'description' => 'Trà sữa trân châu hoàng kim siêu ngon','type_id'],
            [ 'product_name' => 'Milk tea brother', 'image' => 'milk-tea-brother.jpg','price' => 29000, 'description' => 'Trà sữa ba anh em'],
            [ 'product_name' => 'Grass Jelly Milk Coffee', 'image' => 'Grass-Jelly-Milk-Coffee.png','price' => 29000, 'description' => 'Chưa có thông tin'],
            [ 'product_name' => 'Tiger Sugar', 'image' => 'tiger-sugar.jpg','price' => 29000, 'description' => 'Trà sữa đường hổ'],
            [ 'product_name' => 'Hot Pineapple Tea Waiting', 'image' => 'coconut_grande.png','price' => 29000, 'description' => 'Trà dứa nhiệt đới'],
            [ 'product_name' => 'Matcha Milk Tea', 'image' => 'matcha.jpg','price' => 29000, 'description' => 'Trà sữa matcha'],
        ]);
    }
}
