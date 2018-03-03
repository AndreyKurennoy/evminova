<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'name',
        'price',
        'price_type'
    ];
}
