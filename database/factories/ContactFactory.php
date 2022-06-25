<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //  user_id 	status 	list 	name 	cellphone 	city 	email 	origin 	responsible_id 	responsibleOffice
            'user_id' => 1,
            'status' => 1,
            'list'  => 'contacts',
            'name' => $this->faker->name,
            'cellphone' => $this->faker->buildingNumber,
            'city'  => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'origin' => 'Parceria Terceiros',
            'responsible_id' => 1,
            'responsibleOffice' => "Rio Preto",
        ];
    }
}
