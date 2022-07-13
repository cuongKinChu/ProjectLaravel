<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Hữu Cường',
            'email' => 'kimanhlagi14@gmail.com',
            'password' => '$2y$10$Q6sXNky15Qx88AK6ACIPn.B5GvJYLw/nTFT5qQ1/cdDXYgUBhTlbe'
        ]);
        $this->call([
            ProductSeeder::class
        ]);
        $this->call([
            TypeSeeder::class
        ]);
    }
}
