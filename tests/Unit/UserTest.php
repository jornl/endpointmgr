<?php

namespace Tests\Unit;

use App\Models\Department;
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
    public function a_user_belongs_to_many_departments()
    {
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $this->user->departments);

        $departments = Department::factory($count = 5)->create();
        $departments->map(fn ($department) => $department->addUser($this->user));

        $this->assertCount($count, $this->user->fresh()->departments);
    }
}
