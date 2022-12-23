<?php

namespace Tests\Unit;

use App\Models\Department;
use App\Models\Device;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentTest extends TestCase
{

    use RefreshDatabase;

    protected $department;

    protected function setUp(): void
    {
        parent::setUp();

        $this->department = Department::factory()->create();
    }

    /** @test */
    public function a_department_can_have_many_users()
    {
        $this->department->users()->attach(User::factory(5)->create());

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->department->users);
        $this->assertCount(5, $this->department->users);

        $user = User::factory()->create();
        $this->department->users()->attach($user);

        $this->assertCount(6, $this->department->fresh()->users);
    }

    /** @test */
    public function a_department_can_belong_to_a_parent_department()
    {
        $this->department->children()->save($child = Department::factory()->create());

        $this->assertInstanceOf(Department::class, $child->parent);

        $this->assertEquals($child->parent->name, $this->department->name);
    }

    /** @test */
    public function a_department_can_have_many_child_departments()
    {
        $this->department->children()->saveMany(Department::factory($count = 5)->create());

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->department->children);

        $this->assertCount($count, $this->department->children);
    }

    /** @test */
    public function a_department_can_have_many_devices()
    {
        $this->department->devices()->save($device = Device::factory()->create());

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->department->devices);
        $this->assertEquals($this->department->devices[0]->serial_number, $device->serial_number);
    }
}
