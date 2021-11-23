<?php

namespace Database\Factories;

use App\Models\Books;

use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(6, true),
            'price' => $this->faker->numberBetween(25, 150),
            'author_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
