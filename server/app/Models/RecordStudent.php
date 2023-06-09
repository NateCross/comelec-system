<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    // protected $visible = [
    //     'access_code',
    //     'access_code_qr',
    // ];

    protected $casts = [
        'is_invalid' => 'boolean',
    ];

    // protected $appends = [
    //     'access_code_qr',
    // ];

    // public function getAccessCodeQrAttribute() {
        // dd($this->access_code);
        // return QrCode::generate($this->access_code);
    // }

    // protected function accessCodeQr(): Attribute {
    //     return Attribute::make(
    //         get: fn ($value, $attributes) => dd($attributes),
    //     );
    // }
}
