<?php

namespace Database\Factories;

use App\Models\DeviceModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serial_number' => Str::random(8),
            'model_number' => DeviceModel::factory()->create()->id,
            'assignable_type' => null,
            'assignable_id' => null
        ];
    }
}
