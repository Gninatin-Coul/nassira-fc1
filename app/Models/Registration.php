<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['parent_name', 'child_name', 'child_birth_date', 'email', 'phone', 'status'];

    protected $casts = [
        'child_birth_date' => 'date',
    ];
}
