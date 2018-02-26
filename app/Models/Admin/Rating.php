<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 03.02.2018
 * Time: 12:29
 */

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'category_id',
        'sheet_id',
        'points',
        'token',
        'ip',
        'slug'
    ];

    public function sheet(){
        return $this->belongsTo('App\Models\Admin\Sheet');
    }
}