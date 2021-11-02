<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Personalozamos campos de la tabla empleados 
            'tipo_documento' => $this->faker->word(),
            'documento' => $this->faker->unique()->buildingNumber(),
            'nombres' =>$this->faker->userName(),
            'apellidos' => $this->faker->lastName(),
            'area' => $this->faker->word(),
            'subarea' => $this->faker->word()
           
        ];
    }
}
