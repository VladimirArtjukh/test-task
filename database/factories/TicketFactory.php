<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = now();
        return [
            'subject'   => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content'   => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'user_name' => $this->faker->name,
            'email'     => $this->faker->companyEmail,
            'created_at' => $now,
            'updated_at' => $now
        ];
    }
}
