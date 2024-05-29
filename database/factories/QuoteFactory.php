<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => "Last Argument of Kings",
            "author" => "Joe Abercrombie",
            "image" => "6901175",
            "quote" => "Juggling knives. One comes down, two go up. Always more blades spinning in the air, and each one with a deadly edge.",
            "page" => "181",
            "character" => "Glokta",
            "user_id" => 1,
        ];
    }
}
