<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polyline extends Model
{
    protected $table = 'polyline_sekolah';
    use HasFactory;

    protected $fillable = [
        'sekolah_id',
        'latitude',
        'longitude',
    ];
}
