<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $primaryKey = 'fingerprint';
    public $incrementing = false;

    protected $fillable = [
        'fingerprint', 'site_id', 'client_id', 'user_agent', 'browser', 'engine', 'os', 'device_type', 'device_model', 'cpu', 'screen_resolution', 'color_depth', 'plugins', 'mime_types', 'fonts', 'timezone', 'language'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function visits() {
        return $this->hasMany(Visit::class);
    }
}
