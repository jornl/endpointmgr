<?php

namespace Tests\Feature\Device;

use App\Models\Manufacturer;
use Facades\Tests\Setup\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateManufacturerTest extends TestCase
{
    use RefreshDatabase;

    public $manufacturer;

    public function setUp(): void
    {
        parent::setUp();

        $this->manufacturer = Manufacturer::factory()->create();
    }

    /** @test */
    public function guests_cannot_update_manufacturers()
    {
        $this->patch(route('manufacturer.update', $this->manufacturer->id), [])
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function unauthorized_users_cannot_update_manufacturers()
    {
        $this->signIn();

        $this->patch(route('manufacturer.update', $this->manufacturer->id), ['name' => 'Dell Inc.'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('manufacturers', ['name' => 'Dell Inc.']);
    }

    /** @test */
    public function authorized_users_can_update_manufacturers()
    {
        $user = UserFactory::withPermissionTo('manage_manufacturer')->create();

        $this->signIn($user);

        $this->patch(route('manufacturer.update', $this->manufacturer->id), ['name' => 'Dell Inc.'])
            ->assertRedirect(route('manufacturer.show', $this->manufacturer->id));
        // @TODO: Create pages.. and->assertSee('Dell Inc.')

        $this->assertDatabaseHas('manufacturers', ['name' => 'Dell Inc.']);
    }
}
