<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// akan mereference kepada table Product
class Product extends Model
{
    use HasFactory;

    // meneymbunyikan tabel agar tidak terlihat saat hit endpoint API
    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}
