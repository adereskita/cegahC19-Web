<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCovid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'umur',
        'gender',
        'nik',
        'telepon',
        'provinsi',
        'kota',
        'alamat',
        'gejala',
        'created_at',
        'updated_at'

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
