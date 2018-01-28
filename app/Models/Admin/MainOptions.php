<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MainOptions extends Model
{
    protected $table = 'main_pages_options';

    protected $fillable = [
        'page',
        'option_name',
        'value',
    ];
}