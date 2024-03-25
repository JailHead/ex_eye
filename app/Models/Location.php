<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Location extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'locations';

    protected $fillable = ['device', 'name', 'temperature', 'moist'];
}
