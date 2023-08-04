<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'image',
        'description',
        'uploaded_at',
        'author',
    ];

    protected $dates = [
        'uploaded_at',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
