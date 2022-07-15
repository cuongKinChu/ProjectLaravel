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
            [ 'product_name' => 'Milk tea star', 'image' => '/storage/uploads/2022/07/14/milk-tea-start.jpg','price' => 29000, 'description' => 'Trà sữa trân châu hoàng kim siêu ngon'],
            [ 'product_name' => 'Milk tea brother', 'image' => '/storage/uploads/2022/07/14/milk-tea-brother.jpg','price' => 29000, 'description' => 'Trà sữa ba anh em'],
            [ 'product_name' => 'Grass Jelly Milk Coffee', 'image' => '/storage/uploads/2022/07/14/Grass-Jelly-Milk-Coffee.png','price' => 29000, 'description' => 'Chưa có thông tin'],
            [ 'product_name' => 'Tiger Sugar', 'image' => '/storage/uploads/2022/07/14/tiger-sugar.jpg','price' => 29000, 'description' => 'Trà sữa đường hổ'],
            [ 'product_name' => 'Hot Pineapple Tea Waiting', 'image' => '/storage/uploads/2022/07/14/coconut_grande.png','price' => 29000, 'description' => 'Trà dứa nhiệt đới'],
            [ 'product_name' => 'Matcha Milk Tea', 'image' => '/storage/uploads/2022/07/14/matcha.jpg','price' => 29000, 'description' => 'Trà sữa matcha'],
        ]);
    }
}
