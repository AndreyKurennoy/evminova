<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 21.02.18
 * Time: 9:49
 */

namespace App\Services\Admin;

use App\Models\Admin\Review;

class ReviewService
{
    public function storeData($data){
        $review = new Review();
        $review->fill($data);
        $review->save();
    }

    public function deleteById($id){
        $review = Review::findOrFail($id);
        $review->delete();
    }

    public function getAllReviews(){
        return $review = Review::where('status', 1)->get();
    }

    public function updateById($id, $data){
        $review = Review::findOrFail($id);
        $review->fill($data);
//        $review->status = 0;
        $review->save();

    }
}