<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doctor extends Model
{
    use SoftDeletes;
    protected $table = 'doctors';

    protected $fillable = [
        'firstName',
        'lastName',
        'description',
        'photo'
    ];

    public function sheets(){
        return $this->belongsToMany('App\Models\Admin\Sheet', 'doctor_sheet');
    }
}
