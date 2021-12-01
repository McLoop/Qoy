<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestResponse extends Model
{
    protected $table = 'request_response';
	protected $fillable = ['user_id', 'property_request_id', 'message', 'request_response_type', 'request_response_state'];
}
