<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $casts = [
        'is_enrolled' => 'boolean',
    ];

    protected $fillable = [
        'student_id',
        'full_name',
        'college',
        'is_enrolled',
    ];

    public function election_records() {
        return $this->belongsToMany(
            ElectionRecord::class,
            'record_students',
            'student_id',
            'election_id',
        );
    }
}
