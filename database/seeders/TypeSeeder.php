<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Hữu Cường',
            'email' => 'kimanhlagi14@gmail.com',
            'password' => '$2y$10$Q6sXNky15Qx88AK6ACIPn.B5GvJYLw/nTFT5qQ1/cdDXYgUBhTlbe'
        ]);
    }
}
