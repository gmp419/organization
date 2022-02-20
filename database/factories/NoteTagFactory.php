<?php

namespace Database\Factories;

use App\Models\NoteTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NoteTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->word,

        ];
    }
}
