<?php

namespace Tests\Feature\Device;

use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateManufacturerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_update_manufacturers()
    {
        $manufacturer = Manufacturer::factory()->create();

        $this->patch(route('manufacturer.update', $manufacturer->id), [])
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function authorized_users_can_update_manufacturers()
    {
        $manufacturer = Manufacturer::factory()->create();

        $this->signIn();

        $this->patch(route('manufacturer.update', $manufacturer->id), ['name' => 'Dell Inc.'])
            ->assertRedirect(route('manufacturer.show', $manufacturer->id));
        // @TODO: Create pages.. and->assertSee('Dell Inc.')

        $this->assertDatabaseHas('manufacturers', ['name' => 'Dell Inc.']);
    }
}
