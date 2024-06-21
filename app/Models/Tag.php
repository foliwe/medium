<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;


    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class);
    }
}