<?php

namespace App\Services\Admin;

use App\Models\Admin\Rating;
use App\Models\Admin\Sheet;

class RatingService {
    public function findToken($token, $slug){
        return Rating::where(['token' => $token, 'slug' => $slug])->first();
    }

    public function saveRating($data){
        $raiting = new Rating();
        $raiting->fill($data);
        $raiting->save();
    }

    public function saveSlugRating($data){
        $rating = new Rating();
        $rating->fill($data);
        $rating->save();
    }

    public function getSlugRating($slug){
        $slug_arr = explode('/',$slug);
        $slug_1 = end($slug_arr);
        $ratings = Rating::where('slug', $slug)->get();
//        dd($ratings);
        $ratingSlug['count'] = $ratings->count();
        $title = Sheet::where('slug', $slug_1)->first();
//        dd($title);
        $ratingSlug['name'] = !empty($title) ? $title->title : '';
        $ratingsSum = 0;
        if ($ratingSlug['count'] !== 0) {
            foreach ($ratings as $rating){
                $ratingsSum += $rating->points;
            }
            $ratingSlug['value'] = $ratingsSum / $ratingSlug['count'];
        }else{
            $ratingSlug['value'] = 5;
        }
        return $ratingSlug;
    }
}