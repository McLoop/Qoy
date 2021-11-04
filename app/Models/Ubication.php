<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $table = 'ubication';
	protected $fillable = ['region_id', 'zone_id', 'ubication_status'];
}
