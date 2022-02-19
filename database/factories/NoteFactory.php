<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'tag_name' => $this->faker->word(),
            'image' => $this->faker->imageUrl('800', '600'),
            'user_id' => User::factory(),
        ];
    }
}
