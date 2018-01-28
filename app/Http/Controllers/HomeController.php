<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Admin\MainOptionsService;

class HomeController extends Controller
{

    public $mainOptionsService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MainOptionsService $mainOptionsService)
    {
        $this->middleware('auth');
        $this->mainOptionsService = $mainOptionsService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = $this->mainOptionsService->getPageOptions('home');
//        dd($options);
        return view('home', compact('options'));
    }
}
