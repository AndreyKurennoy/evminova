<?php

namespace App\Http\Controllers;

use App\Models\Admin\Prices;
use App\Models\Admin\PricesTypes;
use App\Models\Admin\Review;
use App\Services\Admin\ReviewService;
use App\Models\Admin\Sheet;
use App\Services\Admin\DoctorService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public $doctorService;
    public $reviewService;

    public function __construct(
        DoctorService $doctorService,
        ReviewService $reviewService
    )
    {
        $this->doctorService = $doctorService;
        $this->reviewService = $reviewService;
    }
    public function index(){

//        dd($content);

    }

    public function about(){
        $content = Sheet::where(['category_name' => 'about', 'slug' => 'about'])->first();
        return view('about.center', compact('content'));
    }

    public function doctors(){
        $doctors = $this->doctorService->getAll();
//        dd($doctors);
        return view('about.doctors', compact('doctors'));
    }

    public function guestbook(){

        $reviews = $this->reviewService->getAllReviews();
        return view('about.guestbook', compact('reviews'));
    }

    public function prices(){
        $prices = Prices::all();
        $price_types = PricesTypes::all();
        return view('prices', compact('price_types', 'prices'));
    }

    public function certificates(){
        return view('about.certificates');
    }

    public function lechim(){
//        $sheets = Sheet::where('category', 3)->get();
        return view('lechim', compact('sheets'));
    }

    public function contacts(){
        return view('contacts');
    }
}
