<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // This allows you to save these 3 fields
    protected $fillable = [
        'name',
        'title',
        'description',
    ];
}
