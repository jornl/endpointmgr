<?php

namespace Tests\Unit\Devices;

use App\Models\Device;
use App\Models\DeviceModel;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_manufacturer()
    {
        $deviceModel = DeviceModel::factory()->create();

        $this->assertInstanceOf(Manufacturer::class, $deviceModel->manufacturer);
    }

    /** @test */
    public function manufacturers_can_have_many_models()
    {
        $manufacturer = Manufacturer::factory()->create();
        DeviceModel::factory($count = 5)->create(['manufacturer_id' => $manufacturer->id]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $manufacturer->models);
        $this->assertCount($count, $manufacturer->models);
    }

    /** @test */
    public function it_can_have_many_devices()
    {
        $deviceModel = DeviceModel::factory()->create();
        Device::factory($count = 5)->create(['device_model_id' => $deviceModel->id]);

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $deviceModel->devices);
        $this->assertCount($count, $deviceModel->devices);
    }
}
