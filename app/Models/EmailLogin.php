<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EmailLogin extends Model
{
    public $fillable = ['email', 'token'];

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public static function createForEmail($email)
    {
        return self::create([
            'email' => $email,
            'token' => Str::random(30)
        ]);
    }

    public static function validFromToken($token)
    {
        return self::where('token', $token)
            ->where('created_at', '>', Carbon::parse('-15 minutes'))
            ->firstOrFail();
    }
}
