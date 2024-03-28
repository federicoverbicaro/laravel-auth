<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Support\Str;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'new_image',
        'category',
        'client',
        'date',
        'url',
        'slug'
    ];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

}
