<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'device_id', 'ip', 'latitude', 'longitude', 'accuracy', 'http_referer'
    ];
}
