<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordCandidate extends Model
{
    use HasFactory;

    protected $table = 'record_candidates';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'election_id',
        'candidate_id',
        'is_elected',
        'num_of_votes',
        'reason',
    ];

    protected $casts = [
        'is_elected' => 'boolean',
    ];


}
