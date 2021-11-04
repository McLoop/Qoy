<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';
	protected $fillable = ['zone_name', 'zone_status'];
}
