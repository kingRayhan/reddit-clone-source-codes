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

            $hasAttachment = rand(0 , 1);

            return [
                "title" => $title,
                "url" => $this->faker->url(),
                "attachment" => $hasAttachment ? $this->faker->imageUrl() : null,
                "attachment_type" => $hasAttachment ? "IMAGE" : null,
                "thread_type" => "LINK"
            ];
        } else { // text thread
            return [
                "title" => $title,
                "text" => $this->faker->paragraph(30),
                "thread_type" => "TEXT"
            ];
        }
    }
}
