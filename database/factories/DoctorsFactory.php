<?php

namespace Database\Factories;

use App\Models\Doctors;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FirstName' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'Specialization' => $this->faker->jobTitle,
            'PhoneNumber' => $this->faker->phoneNumber,
            'Email' => $this->faker->unique()->safeEmail,
            'ExperienceYears' => $this->faker->numberBetween($min = 1, $max = 20),
            'WorkSchedule' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'Adress' => $this->faker->address,
            'Photo' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
