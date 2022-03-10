<?php

namespace Database\Factories;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '',
            'product_id' => rand(1, 10),
            'status' => $this->faker->randomElement([Service::STATUS_ACTIVE,
                Service::STATUS_PENDING,
                Service::STATUS_CANCELLED,
                Service::STATUS_EXPIRED,
                Service::STATUS_SUSPEND
            ]),
            'statred_at'=>Carbon::now()->subHour(rand(1,72)),
            'expired_at'=>Carbon::now()->addHour(rand(1,2))->addMinute(rand(1,59))


        ];
    }
}
