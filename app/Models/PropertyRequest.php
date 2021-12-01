<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    protected $table = 'property_request';
	protected $fillable = ['user_id', 'thing_id', 'request_type', 'request_state', 'degree_interest', 'message'];
}
