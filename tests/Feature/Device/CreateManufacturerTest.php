<?php

namespace Tests\Feature\Device;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\UserFactory;
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
    public function unauthorized_users_cannot_create_manufacturers()
    {
        $this->signIn();

        $this->post(route('manufacturer.store', ['name' => 'Dell Inc.']))
            ->assertStatus(403);

        $this->assertDatabaseEmpty('manufacturers');
    }

    /** @test */
    public function authorized_users_can_create_manufacturers()
    {
        $user = UserFactory::withPermissionTo('create_manufacturer')->create();

        $this->signIn($user);

        $this->post(route('manufacturer.store', ['name' => 'Dell Inc.']))
            ->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('manufacturers', ['name' => 'Dell Inc.']);
    }
}
