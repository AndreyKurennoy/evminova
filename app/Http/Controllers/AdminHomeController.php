<?php

namespace App\Http\Controllers;
use App\Models\Admin\MainOptions;
use App\Services\Admin\MainOptionsService;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
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
        $url = url()->current();
        $url_split = preg_split("/(\/)/", $url);
        $options = $this->mainOptionsService->getPageOptions($url_split[4]);
//        dd($options->where('option_name', 'text_1')->pluck('value'));
//        dd($options);
        return view('vendor.voyager.home.' . $url_split[4], compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $options = $this->mainOptionsService->update($request->request);
        dd($options);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
