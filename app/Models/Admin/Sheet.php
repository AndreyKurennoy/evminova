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
        'preview',
        'preview_img',
        'category_name',
        'seo_title',
        'body',
        'meta_description',
        'meta_keywords',
        'status',
        'slug',
        'header',
        'sort'
//        'doctor_id'
    ];

    public function doctors(){
        return $this->belongsToMany('App\Models\Admin\Doctor', 'doctor_sheet');
    }

    public function ratings(){
        return $this->hasMany('App\Models\Admin\Rating');
    }

    public function reviews() {
        return $this->belongsToMany('App\Models\Admin\Review', 'reviews_sheets');
    }
}
