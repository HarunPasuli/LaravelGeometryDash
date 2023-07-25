<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityNews extends Model
{
    use HasFactory;

    protected $table = 'community_news';

    protected $fillable = [
        'title',
        'image',
        'description',
        'uploaded_at',
        'author',
        'sources',
    ];

    protected $dates = [
        'uploaded_at',
    ];

    protected $casts = [
        'sources' => 'array',
    ];
}
