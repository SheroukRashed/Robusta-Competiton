<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => 'Sherouk@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$zlYakkIuLEtwpEFfXlq9VeU.esh9lB4DRAzZpRyE1MzQrx6qxyp42', // password is 123456
            'remember_token' => '12345678910',
        ];
    }
}
