<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelGuesser extends Model
{
    protected $table = 'levels';
    protected $primaryKey = 'lid';

    protected $fillable = [
        'level',
        'alt1',
        'alt2',
        'alt3',
        'difficulty',
        'filename',
    ];
}
