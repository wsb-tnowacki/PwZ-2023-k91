<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posty>
 */
class PostyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::get('id')->toArray();
        $id_user = array();
        foreach ($user_id as $key ) {array_push($id_user,$key['id']);
        }
        $los_id_user = Arr::random($id_user);
        return [
            'tytul' => fake()->sentence(fake()->numberBetween(2,7)),
            //'autor' => fake()->name(),
            'email' => fake()->freeEmail(),
            'tresc' => fake()->text(),
            'user_id' => $los_id_user,
            'created_at' => fake()->dateTime()
        ];
    }
}
