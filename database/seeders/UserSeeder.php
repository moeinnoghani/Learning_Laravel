<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create()->each(function ($user) {
            Service::factory()->count(rand(2, 5))->create([
                'user_id' => $user->id
            ]);
        });
    }
}
