<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'newsletter_id' => Newsletter::factory(),
            'subscribed_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
