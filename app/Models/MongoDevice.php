<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class MongoDevice extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'devices';

    protected $fillable = ['owner', 'device_id', 'name', 'model', 'location', 'active'];
}
