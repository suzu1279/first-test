<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' =>$this->faker->randomNumber(1,5),
            'last_name' =>$this->faker->lastName,
            'first_name' =>$this->faker->firstName,
            'gender' =>$this->faker->randomElement($array=['男性','女性','その他']),
            'email' =>$this->faker->safeEmail,
            'tel' =>$this->faker->randomNumber('0##########'),
            'address' =>$this->faker->address,
            'building' =>$this->faker->secondaryAddress,
            'detail' =>$this->faker->sentence,
            'created_at' =>$this->faker->date(),
            'updated_at' =>$this->faker->date(),
        ];
    }
}
