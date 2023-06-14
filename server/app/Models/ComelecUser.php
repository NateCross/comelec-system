<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ComelecUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'comelec_user';

    protected $fillable = [
        'student_id',
        'username',
        'name',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function student() {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'student_id',
        );
    }
}
