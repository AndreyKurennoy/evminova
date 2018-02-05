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
        $meta = [
            'title' => $options->where('option_name', 'seo_title')->pluck('value')->first(),
            'description' => $options->where('option_name', 'meta_description')->pluck('value')->first(),
            'keywords' => $options->where('option_name', 'meta_keywords')->pluck('value')->first(),
        ];
//        dd($options);
        return view('home', compact('options', 'meta'));
    }
}
