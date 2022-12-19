<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function addUser(User $user)
    {
        return $this->users()->attach($user);
    }

    public function removeUser(User $user)
    {
        return $this->users()->detach($user);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_department', 'parent_id', 'department_id')
            ->withTimestamps()
            ->with('departments');
    }
}
