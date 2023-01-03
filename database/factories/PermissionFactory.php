<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nouns = ['create', 'read', 'update', 'delete'];
        $types = ['posts', 'devices', 'departments', 'manufacturer'];

        return [
            'name' => "{$nouns[rand(0, 3)]}_{$types[rand(0, 3)]}",
            'label' => str_replace("_", " ", ucwords("{$nouns[rand(0, 3)]}_{$types[rand(0, 3)]}")),
        ];
    }
}
