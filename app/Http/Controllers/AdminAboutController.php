<?php

namespace App\Http\Controllers;

use App\Models\Admin\Sheet;
use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;
use App\Http\Requests\SheetsRequest;
class AdminAboutController extends Controller
{
    public $sheetsService;

    public function __construct(
        SheetsService $sheetsService
    )
    {
        $this->sheetsService = $sheetsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sheets = Sheet::where(['category_name' => 'about'])->get();
        return view('vendor.voyager.about.browse',compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('vendor.voyager.about.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetsRequest $request)
    {
        $this->sheetsService->storeAbout($request->request->all());
        return redirect(route("voyager.about.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sheet = $this->sheetsService->getById($id);
        return view('vendor.voyager.about.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SheetsRequest $request, $id)
    {
        $this->sheetsService->updateAbout($request->request->all(), $id);
        return redirect(route("voyager.about.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sheetsService->softDelete($id);
        return redirect(route("voyager.about.index"));
    }

    public function saveMeta(Request $request){
//        $sheets = $this->sheetsService
    }
}
