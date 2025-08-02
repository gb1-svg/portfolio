<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'image',
        'demo_url',
        'github_url',
        'technologies',
        'is_published', // Pastikan ini ada di fillable
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_published' => 'boolean', // <--- PASTIKAN BARIS INI ADA!
    ];

    // ... metode lain jika ada
}