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

    public function students() {
        return $this->belongsToMany(
            Student::class,
            'record_students',
            'election_id',
            'student_id',
            null,
            'student_id',
        )->withPivot(['id', 'vote_timestamp', 'ac_view_timestamp', 'is_invalid']);
    }

    public function validStudents() {
        return $this->belongsToMany(
            Student::class,
            'record_students',
            'election_id',
            'student_id',
            null,
            'student_id',
        )->withPivot(['id', 'vote_timestamp', 'ac_view_timestamp', 'is_invalid'])->wherePivot('is_invalid', false)->orderBy('vote_timestamp', 'desc')->orderBy('ac_view_timestamp', 'desc');
    }

    public function candidates() {
        return $this->belongsToMany(
            Candidate::class,
            'record_candidates',
            'election_id',
            'candidate_id',
        )->withPivot(['id', 'num_of_votes', 'is_elected', 'reason'])->orderBy('id', 'desc');
    }
}
