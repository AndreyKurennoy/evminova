<?php

namespace App\Http\Controllers;

use App\Models\Admin\Sheet;
use App\Services\Admin\DoctorService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public $doctorService;

    public function __construct(
        DoctorService $doctorService
    )
    {
        $this->doctorService = $doctorService;
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
        return view('about.guestbook');
    }
}
