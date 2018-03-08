<?php

namespace App\Http\Controllers;

use App\Models\Admin\Sheet;
use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;
use App\Services\Admin\RatingService;
use App\Services\Admin\MainOptionsService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
        $options = $this->mainOptionsService->getPageOptions('services-news');
        $meta = [
            'title' => $options->where('option_name', 'seo_title')->pluck('value')->first(),
            'description' => $options->where('option_name', 'meta_description')->pluck('value')->first(),
            'keywords' => $options->where('option_name', 'meta_keywords')->pluck('value')->first(),
        ];
        return view('lechim', compact('options', 'meta'));
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
        $currentSheet = $this->sheetsService->getByKeywordPublished($keyword);
//        dd($currentSheet);
        return view('lechim', compact('currentSheet'));
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

    public function all(Request $request)
    {
        if($request['page'] == 1){
            return redirect(route('articles'));
        }
        $news = Sheet::where('category', 3)->paginate(10);
//        dd($news);
        $img = Storage::url('public/thumbs/наш_центр.jpg');

        $counter = 0;
        foreach ($news as $article){
            $img = $article->preview_img;
            $img_array = explode('/', $img);
            $news[$counter]->preview_img = end($img_array);

            $date = $article->created_at;
            $news[$counter]->date = date('d.m.Y',strtotime($date));

            $counter++;
        }

        return view('allNews', compact('img', 'news'));
    }
}
