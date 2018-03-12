<?php

namespace App\Http\Controllers;

use App\Services\Admin\ReviewService;
use Illuminate\Http\Request;
use App\Services\Admin\MainOptionsService;
class AdminMainServicesController extends Controller
{
    public $mainOptionsService;

    public function __construct(
        MainOptionsService $mainOptionsService
    )
    {
        $this->mainOptionsService = $mainOptionsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url_pathes = explode('/',$request->path());
        $url_path = end($url_pathes);
        $options = $this->mainOptionsService->getPageOptions(end($url_pathes));
        return view('vendor.voyager.home.services', compact('options', 'url_path'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url_pathes = explode('/',$request->path());
        $options = $this->mainOptionsService->update($request->request->all(), end($url_pathes));
        return redirect(route("voyager.". end($url_pathes) .".index"));
    }
}
