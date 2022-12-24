<?php

namespace Tests\Unit;

use App\Models\Department;
use App\Models\Device;
use App\Models\DeviceService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /** @test */
    public function a_user_can_belong_to_many_departments()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->user->departments);

        $departments = Department::factory($count = 5)->create();
        $departments->map(fn ($department) => $department->addUser($this->user));

        $this->assertCount($count, $this->user->fresh()->departments);
    }

    /** @test */
    public function it_can_have_many_devices()
    {
        $this->user->devices()->save($device = Device::factory()->create());

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->user->devices);
        $this->assertEquals($this->user->devices[0]->serial_number, $device->serial_number);
    }

    /** @test */
    public function it_can_have_many_device_services()
    {
        $this->user->deviceServices()->save($service = DeviceService::factory()->create());

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->user->deviceServices);
        $this->assertEquals($this->user->deviceServices[0]->id, $service->id);
    }
}
