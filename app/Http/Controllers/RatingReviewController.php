<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Services\Admin\RatingService;
use App\Services\Admin\ReviewService;
use Illuminate\Http\Request;

class RatingReviewController extends Controller
{
    public $ratingService;
    public $reviewService;

    public function __construct(RatingService $ratingService,
                    ReviewService $reviewService
)
    {
        $this->ratingService = $ratingService;
        $this->reviewService = $reviewService;
    }

    public function addRating(Request $request){
//        dd($request);
        $verify = $this->ratingService->findToken($request->input('token'));
        if ($verify === null){
            $this->ratingService->saveSlugRating($request->request->all());
            $output = array('success' => 'true');
        }else{
            $output = array('error' => 'false');
        }
        return response()->json($output);
    }

    public function addReview(ReviewRequest $request){
        $this->reviewService->storeData($request->request->all());
        $output = array('success' => 'true');
        return response()->json($output);
    }
}
