<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_name',
        'description',
        'is_for_all',
        'college',
        'num_of_elects',
    ];

    protected $casts = [
        'is_for_all' => 'boolean',
    ];

    public function candidates() {
        return $this->hasMany(Candidate::class);
    }
}
