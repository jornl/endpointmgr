<?php

namespace Tests\Devices\Unit;

use App\Models\Department;
use App\Models\Device;
use App\Models\DeviceModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    use RefreshDatabase;

    protected $device;

    public function setUp(): void
    {
        parent::setUp();

        $this->device = Device::factory()->create();
    }

    /** @test */
    public function it_belongs_to_a_device_model()
    {
        $this->assertInstanceOf(DeviceModel::class, $this->device->model);
    }

    /** @test */
    public function it_can_belong_to_a_user()
    {
        $this->device->assignable()->associate($user = User::factory()->create());

        $this->assertInstanceOf(User::class, $this->device->assignable);
        $this->assertEquals($this->device->assignable, $user);
    }

    /** @test */
    public function it_can_belong_to_a_department()
    {
        $this->device->assignable()->associate($department = Department::factory()->create());

        $this->assertInstanceOf(Department::class, $this->device->assignable);
        $this->assertEquals($this->device->assignable, $department);
    }
}
