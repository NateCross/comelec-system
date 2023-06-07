<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectionRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
        'description',
        'start_time',
        'end_time',
    ];
}
