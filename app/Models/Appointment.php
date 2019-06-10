<?php

namespace App\Models;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	public function user() {
    	return $this->hasOne(User::class);
    }

    public function package() {
    	return $this->hasOne(Package::class);
    }
}
