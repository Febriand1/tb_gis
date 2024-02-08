<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = 'masjid';
    use HasFactory;

    protected $fillable = [
        'namamasjid',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat',
        'latitude',
        'longitude',
    ];
}
