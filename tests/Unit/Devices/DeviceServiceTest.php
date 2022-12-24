<?php

namespace Tests\Unit\Devices;

use App\Models\Device;
use App\Models\DeviceService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_device()
    {
        $service = DeviceService::factory()->create();

        $this->assertInstanceOf(Device::class, $service->device);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        $service = DeviceService::factory()->create();

        $this->assertInstanceOf(User::class, $service->user);
    }
}
