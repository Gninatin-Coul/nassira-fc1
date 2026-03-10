<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['opponent', 'match_date', 'home_score', 'away_score', 'location'];

    protected $casts = [
        'match_date' => 'datetime',
    ];
}
