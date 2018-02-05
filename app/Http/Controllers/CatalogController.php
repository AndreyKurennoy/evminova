<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;
use App\Services\Admin\RatingService;
use App\Services\Admin\MainOptionsService;

class CatalogController extends Controller
{

    public $ratingService;
    public $sheetsService;
    public $mainOptionsService;

    public function __construct(
        RatingService $ratingService,
        SheetsService $sheetsService,
        MainOptionsService $mainOptionsService
    )
    {
        $this->sheetsService = $sheetsService;
        $this->ratingService = $ratingService;
        $this->mainOptionsService = $mainOptionsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = $this->sheetsService->getAllPublishedCatalog();
        $options = $this->mainOptionsService->getPageOptions('services');
        $meta = [
            'title' => $options->where('option_name', 'seo_title')->pluck('value')->first(),
            'description' => $options->where('option_name', 'meta_description')->pluck('value')->first(),
            'keywords' => $options->where('option_name', 'meta_keywords')->pluck('value')->first(),
        ];
        $profPhoto = $this->mainOptionsService->profPhoto();

        return view('catalog', compact('sheets', 'meta', 'options', 'profPhoto'));
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
        $profPhoto = $this->mainOptionsService->profPhoto();

        $meta = [
            'title' => $currentSheet->seo_title,
            'description' => $currentSheet->meta_description,
            'keywords' => $currentSheet->meta_keywords
        ];
        return view("catalog", compact('currentSheet', 'sheets', 'meta', 'doctors', 'rating', 'profPhoto'));
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
