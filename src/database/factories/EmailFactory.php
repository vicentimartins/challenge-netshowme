<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'jhon dear',
            'email' => 'contact@jhon.dear',
            'phone' => '+5583998242740',
            'message' => 'foo bar baz',
            'ip' => '127.0.0.1',
            'attachment' => 'app/storage/app/file.txt',
        ];
    }
}
