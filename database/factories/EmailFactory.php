<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'subject' => $this->faker->text(30),
            'body' => $this->faker->text(200),
            'status' => $this->faker->randomElement(
                [Email::STATUS_CANCELLED,
                    EMail::STATUS_FAILED,
                    Email::STATUS_SENT,
                    Email::STATUS_PENDING
                ])
        ];
    }
}
