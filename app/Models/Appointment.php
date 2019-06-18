<?php

namespace App\Models;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	protected $fillable = [
		'name',
		'email',
		'phone',
		'time'
	];
}
