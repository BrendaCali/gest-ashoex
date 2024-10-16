<?php

namespace Database\Factories;

use App\Models\Facilidad;
use App\Models\Aula;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilidadFactory extends Factory
{
    protected $model = Facilidad::class;

    public function definition()
    {
        return [
            'nombre_facilidad' => $this->faker->word(),
            'id_aula' => Aula::factory(),
        ];
    }
}
