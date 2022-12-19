<?php

namespace Tests\Unit;

use App\Models\Department;
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
    public function it_returns_a_collection_of_users()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->department->users);
    }

    /** @test */
    public function it_has_many_users()
    {
        $this->department->users()->attach(User::factory(5)->create());

        $this->assertCount(5, $this->department->users);

        $user = User::factory()->create();
        $this->department->users()->attach($user);

        $this->assertCount(6, $this->department->fresh()->users);
    }

    /** @test */
    public function it_returns_a_collection_of_departments()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->department->departments);

        $this->department->departments()->attach(Department::factory(2)->create());

        $this->assertCount(2, $this->department->fresh()->departments);
    }

    /** @test */
    public function a_department_can_have_infinite_children()
    {
        $this->department->departments()->attach($childDepartment = Department::factory()->create());

        $this->assertEquals($this->department->departments[0]->name, $childDepartment->name);

        $childDepartment->departments()->attach($grandChildDepartment = Department::factory()->create());

        $this->assertEquals($childDepartment->departments[0]->name, $grandChildDepartment->name);
    }
}
