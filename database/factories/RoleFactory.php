<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roles = ['user', 'manager', 'technician', 'administrator'];

        return [
            'name' => $roles[rand(0, 3)],
            'label' => ucwords($roles[rand(0, 3)]),
        ];
    }
}
