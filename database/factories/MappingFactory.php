<?php
namespace Database\Factories;

use App\Models\Mapping;
use Illuminate\Database\Eloquent\Factories\Factory;

class MappingFactory extends Factory
{
    protected $model = Mapping::class;

    public function definition()
    {
        $type = 'Drainase';

        return [
            'name' => 'Drainase ' . $this->faker->streetName,
            'location' => $this->faker->randomElement(['Sangatta Utara', 'Sangatta Selatan', 'Teluk Pandan']),
            'proposal_source' => 'Dinas PU',
            'proposal_year' => $this->faker->numberBetween(2022, 2024),
            'planning_year' => $this->faker->numberBetween(2022, 2024),
            'execution_year' => $this->faker->numberBetween(2022, 2024),
            'condition' => $this->faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat']),
            'paving' => 'Tidak diketahui',
            'type' => $type,
            'status' => $this->faker->randomElement(['Usulan', 'Valid', 'Eksisting']),
            'length' => $this->faker->randomFloat(2, 10, 300),
            'width' => $this->faker->randomFloat(2, 1, 10),
            'polyline' => json_encode([[$this->faker->latitude, $this->faker->longitude], [$this->faker->latitude, $this->faker->longitude]])
        ];
    }
}
