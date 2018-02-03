<?php

namespace App\Services\Admin;

use App\Models\Admin\Rating;

class RatingService {
    public function findToken($token){
        return Rating::where('token', $token)->first();
    }

    public function saveRating($data){
        $raiting = new Rating();
        $raiting->fill($data);
        $raiting->save();
    }
}