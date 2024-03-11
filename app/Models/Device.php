<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $guarder = [];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
