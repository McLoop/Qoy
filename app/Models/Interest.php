<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interest';
	protected $fillable = ['user_id', 'category_id', 'interest_type', 'interest_status'];
}
