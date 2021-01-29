<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// reference in table Product
class Product extends Model
{
    use HasFactory;

    // hide data for not visible if HIT endpoint API
    protected $hidden = [
        'updated_at',
        'created_at'
    ];
}
