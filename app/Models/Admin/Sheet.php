<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sheet extends Model
{
    use SoftDeletes;
    protected $table = 'sheets';

    protected $fillable = [
        'category',
        'title',
        'seo_title',
        'body',
        'meta_description',
        'meta_keywords',
        'status',
        'slug',
//        'doctor_id'
    ];

    public function doctors(){
        return $this->belongsToMany('App\Models\Admin\Doctor', 'doctor_sheet');
    }
}
