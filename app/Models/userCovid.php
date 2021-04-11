<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class userCovid extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'id_user',
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

    public $sortable = ['id', 'nama', 'umur', 'gender', 'created_at'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
