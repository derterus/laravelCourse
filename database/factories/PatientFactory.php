<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

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
            'DateOfBirth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'Gender' => $this->faker->randomElement($array = array ('Male','Female')),
            'PhoneNumber' => $this->faker->phoneNumber,
            'Email' => $this->faker->unique()->safeEmail,
            'Diagnosis' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'Adress' => $this->faker->address,
            'Photo' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
