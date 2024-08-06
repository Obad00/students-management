<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'matricule' => $this->faker->unique()->bothify('STU#####'),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'photo' => $this->faker->imageUrl(640, 480, 'people'),
        ];
    }
}
