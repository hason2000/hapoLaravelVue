<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class PasswordReset extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];

    const UPDATED_AT = null;

    public static function getPasswordResetByToken($token)
    {
        return PasswordReset::where('token', $token)->first();
    }

    public function checkTimeValidateToken()
    {
        return Carbon::now()->diffInMinutes($this['created_at']) <= Config::get('passwordreset.limit_time');
    }
}
