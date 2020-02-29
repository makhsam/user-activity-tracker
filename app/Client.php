<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'site_id', 'name', 'phone_number', 'message', 'address'
    ];

    public function devices() {
        return $this->hasMany(Device::class);
    }
}
