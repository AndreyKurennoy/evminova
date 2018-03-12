<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Sheet;
use App\Models\Gallery;
use App\Services\Admin\MainOptionsService;
use App\Services\Admin\SheetsService;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGalleryController extends Controller
{
    public $gallery;
    public $sheets;
    public $main_options;

    public function __construct(GalleryService $galleryService, SheetsService $sheetsService, MainOptionsService $mainOptionsService)
    {
        $this->gallery = $galleryService;
        $this->sheets = $sheetsService;
        $this->main_options = $mainOptionsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = $this->sheets->getSheetByCategoryName('gallery');
        $meta = [];
        $main_options = $this->main_options->getPageOptions('gallery');
        $meta['title'] = $main_options->where('option_name', 'seo_title')->pluck('value')->first();
        $meta['description'] = $main_options->where('option_name', 'meta_description')->pluck('value')->first();
        $meta['keywords'] = $main_options->where('option_name', 'meta_keywords')->pluck('value')->first();
        $meta['h1'] = $main_options->where('option_name', 'title')->pluck('value')->first();
//        dd($meta);
        return view('vendor.voyager.gallery.browse', compact('sheets', 'main_options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.voyager.gallery.add');
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
            'seo_title' => 'required',
            'slug' => 'required|unique:sheets'
        ]);

        $sheet = $this->sheets->savePage($request->request->all());
        $this->gallery->storeData($request->request->all(), 'gallery', $request->input('slug'));
        return redirect(route('voyager.gallery.edit', $sheet));
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
        $sheets = Sheet::where('id',  $id)->first();
        $photos = Gallery::where(['type' => 'gallery', 'url' => $sheets->slug])->get();
        $count = count($photos);
        return view('vendor.voyager.gallery.edit', compact('sheets', 'photos', 'count'));
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

        $request->validate([
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'seo_title' => 'required',
            'slug' => 'required|unique:sheets,slug,' . $id
        ]);
        $sheet = $this->sheets->savePage($request->request->all());
        $this->gallery->storeData($request->request->all(), 'gallery', $request->input('slug'));
        return redirect(route('voyager.gallery.edit', $id));
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

    public function mainMeta(Request $request){
        $this->main_options->update($request->request->all(), 'gallery');
        return redirect(route('voyager.gallery.index'));
    }
}
