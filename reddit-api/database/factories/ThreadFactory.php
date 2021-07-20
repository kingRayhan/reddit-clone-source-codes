<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(5);

        if (rand(0 , 1)) { // link thread
            return [
                "title" => $title,
                "slug" => Str::slug($title),
                "attachment" => $this->faker->imageUrl(),
                "attachment_type" => "IMAGE",
                "thread_type" => "LINK"
            ];
        } else { // text thread
            return [
                "title" => $title,
                "slug" => Str::slug($title),
                "text" => $this->faker->paragraph(30),
                "thread_type" => "TEXT"
            ];
        }
    }
}
