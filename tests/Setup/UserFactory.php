<?php

namespace Tests\Setup;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UserFactory
{
  protected $role;

  protected $permission;

  /**
   * Create a specific permission.
   * 
   * @param string $permission
   * @return UserFactory
   */
  public function withPermissionTo($permission)
  {
    $this->permission = Permission::factory()->create(['name' => $permission]);

    return $this;
  }

  /**
   * Create a specific role.
   * 
   * @param string $role
   * @return UserFactory
   */
  public function withRole($role)
  {
    $this->role = Role::factory()->create(['name' => $role]);

    return $this;
  }

  /**
   * Create and return a fresh instance of the user.
   * 
   * @param array $overrides
   * @return \App\Models\User
   */
  public function create($overrides = [])
  {
    $user = User::factory()->create($overrides);

    if ($this->role) {
      $user->role()->attach($this->role);
    }

    if ($this->permission) {
      $user->role->permissions()->attach($this->permission);
    }

    return $user->refresh();
  }
}
