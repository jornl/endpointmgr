<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $with = ['model'];

    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'device_model_id');
    }

    public function assignable()
    {
        return $this->morphTo();
    }
}
