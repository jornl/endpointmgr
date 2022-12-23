<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;

    protected $with = ['manufacturer'];

    protected $table = 'device_models';

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
