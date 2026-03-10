<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'type',
        'photo_url',
        'bio',
        'order',
    ];

    protected $table = 'staff';
}
