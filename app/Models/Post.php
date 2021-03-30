<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'body', 'image'];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
