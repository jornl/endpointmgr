<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['mobile', 'laptop', 'pc', 'charger'];

        return [
            'id' => Str::random(7),
            'name' => $this->faker->company(),
            'type' => $type[rand(0, 3)],
            'icon' => 'fa-laptop',
            'manufacturer_id' => Manufacturer::factory()->create(),
        ];
    }
}
