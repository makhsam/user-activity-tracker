<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'user_id', 'name', 'url', 'token', 'activated', 'plan'
    ];

    public function devices() {
        return $this->hasMany(Device::class);
    }

    public function clients() {
        return $this->hasMany(Client::class);
    }
}
