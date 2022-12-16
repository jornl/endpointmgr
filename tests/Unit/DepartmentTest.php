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
    public function it_returns_a_collection()
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
}
