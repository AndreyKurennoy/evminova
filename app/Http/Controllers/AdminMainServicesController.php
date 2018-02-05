<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $options = $this->mainOptionsService->getPageOptions('services');
        return view('vendor.voyager.home.services', compact('options'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = $this->mainOptionsService->update($request->request->all(), 'services');

        return redirect(route("voyager.services.index"));
    }
}
