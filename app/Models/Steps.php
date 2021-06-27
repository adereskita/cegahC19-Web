<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    use HasFactory;

    // protected $table = 'steps';

    protected $fillable = [
        'id_user',
        'date',
        'step'
    ];

    public function steps()
    {
        return $this->belongsTo(User::class);
    }
}
