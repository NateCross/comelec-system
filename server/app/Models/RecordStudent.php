<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RecordStudent extends Pivot
{
    use HasFactory;

    protected $table = 'record_students';

    protected $fillable = [
        'election_id',
        'student_id',
        'vote_code',
        'vote_timestamp',
        'access_code',
        'ac_view_timestamp',
        'is_invalid',
    ];

    protected $casts = [
        'is_invalid' => 'boolean',
    ];
}
