<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['category_id', 'first_name', 'last_name', 'birth_date', 'position', 'bio', 'photo_url'];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
