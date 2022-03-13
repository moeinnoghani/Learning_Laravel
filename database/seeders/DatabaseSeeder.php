<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
    }
}
