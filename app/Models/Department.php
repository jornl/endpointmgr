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

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }

    public function devices()
    {
        return $this->morphMany(Device::class, 'assignable');
    }
}
