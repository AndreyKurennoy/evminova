<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;

class CatalogController extends Controller
{

    public $pagesService;
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
        $sheets = $this->sheetsService->getAllPublishedCatalog();
//        dd($sheets);
        return view('catalog', compact('sheets'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($keyword)
    {
        $sheets = $this->sheetsService->getAllPublishedCatalog();
        $currentSheet = $this->sheetsService->getCatalogByKeywordPublished($keyword, 2);

        $meta = [
            'title' => $currentSheet->seo_title,
            'description' => $currentSheet->meta_description,
            'keywords' => $currentSheet->meta_keywords
        ];

        return view("catalog", compact('currentSheet', 'sheets', 'meta'));
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
