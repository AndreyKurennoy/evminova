<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sheets extends Model
{
    use SoftDeletes;
    protected $table = 'sheets';

    protected $fillable = [
        'id',
        'category',
        'title',
        'seo_title',
        'body',
        'meta_description',
        'meta_keywords',
        'status',
        'slug'
    ];
}
