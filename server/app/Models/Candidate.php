<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'position_id',
        'party_name',
        'image_url',
        'is_archived',
    ];

    public function student() {
        return $this->belongsTo(
            Student::class,
            'student_id',
            'student_id',
        );
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function records() {
        return $this->belongsToMany(
            ElectionRecord::class, 
            'record_candidates',
            'election_id',
            'candidate_id',
        );
    }
}
