<?php

namespace Tests\Feature\Device;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateManufacturerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_create_manufacturers()
    {
        $this->post(route('manufacturer.store', []))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function authorized_users_can_create_manufacturers()
    {
        $this->signIn();

        // @TODO: Add Authorization

        $this->post(route('manufacturer.store', ['name' => 'Dell Inc.']))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseCount('manufacturers', 1);
        $this->assertDatabaseHas('manufacturers', ['name' => 'Dell Inc.']);
    }
}
