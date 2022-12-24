<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $with = ['model', 'services'];

    public function model()
    {
        return $this->belongsTo(DeviceModel::class, 'device_model_id');
    }

    public function services()
    {
        return $this->hasMany(DeviceService::class);
    }

    public function assignable()
    {
        return $this->morphTo();
    }
}
