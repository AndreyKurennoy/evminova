<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;
use App\Services\Admin\RatingService;

class CatalogController extends Controller
{

    public $ratingService;
    public $sheetsService;


    public function __construct(
        RatingService $ratingService,
        SheetsService $sheetsService
    )
    {
        $this->sheetsService = $sheetsService;
        $this->ratingService = $ratingService;
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
     * Store created reviews in databse
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verify = $this->ratingService->findToken($request->input('token'));
        if ($verify === null){
            $this->ratingService->saveRating($request->request->all());
            $output = array('success' => 'true');
        }else{
            $output = array('error' => 'false');
        }
//        dd($request->request->all());
        return response()->json($output);
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
        $doctors = $currentSheet->doctors->all();

        //Rating defining for each article in categories
        $ratingPoints = $currentSheet->ratings->sum('points');
        $ratingRows = $currentSheet->ratings->count();
        $rating =[
            'count' => $ratingRows,
            'value' => ($ratingRows !== 0) ? ($ratingPoints / $ratingRows) : 5,
        ];
        //End of rating

        $meta = [
            'title' => $currentSheet->seo_title,
            'description' => $currentSheet->meta_description,
            'keywords' => $currentSheet->meta_keywords
        ];
        return view("catalog", compact('currentSheet', 'sheets', 'meta', 'doctors', 'rating'));
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
