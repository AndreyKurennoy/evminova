<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Review extends Model
{
    use SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'name',
        'email',
        'body',
        'status',
        'problem'
    ];
}
