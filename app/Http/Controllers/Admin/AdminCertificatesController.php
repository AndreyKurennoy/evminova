<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Sheet;
use App\Services\Admin\SheetsService;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCertificatesController extends Controller
{

    public $gallery;
    public $sheets;

    public function __construct(GalleryService $galleryService, SheetsService $sheetsService)
    {
        $this->gallery = $galleryService;
        $this->sheets = $sheetsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = $this->gallery->getbyType('certificate');
        $count = count($photos);
        $sheets = Sheet::where(['slug' => 'certificates'])->first();
        return view('vendor.voyager.certificates.browse', compact('photos', 'count', 'sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'seo_title' => 'required'
        ]);
        $this->gallery->storeData($request->request->all(), 'certificate');
        $this->sheets->savePage($request->request->all());
        return redirect(route('voyager.certificates.index'));
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
        //
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
