<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygon extends Model
{
    protected $table = 'polygon_sekolah';
    use HasFactory;

    protected $fillable = [
        'sekolah_id',
        'latitude',
        'longitude',
    ];
}
