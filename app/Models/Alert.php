<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        //general data registered '2024-03-04 02:16:05'
        'created_at' => 'datetime',
    ];

    public function originDevice()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}