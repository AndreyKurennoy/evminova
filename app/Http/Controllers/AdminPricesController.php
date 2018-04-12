<?php

namespace App\Http\Controllers;

use App\Models\Admin\Prices;
use App\Models\Admin\PricesTypes;
use Illuminate\Http\Request;
use App\Services\Admin\MainOptionsService;

class AdminPricesController extends Controller
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
//        $price_types = PricesTypes::all();
//        $prices_all = PricesTypes::withTrashed()->get();
//        $prices = Prices::all();
//        return view("vendor.voyager.prices.browse", compact('price_types', 'prices', 'prices_all'));

        $url_pathes = explode('/',$request->path());
        $url_path = end($url_pathes);
        $options = $this->mainOptionsService->getPageOptions(end($url_pathes));
        return view('vendor.voyager.prices.index', compact('options', 'url_path'));
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
//        $type = new Prices();
//        $type->fill($request->request->all());
//        $type->save();
//        $output = array('success' => 'true');
//        return response()->json($output);

        $url_pathes = explode('/',$request->path());
        $options = $this->mainOptionsService->update($request->request->all(), end($url_pathes));
        return redirect(route("voyager.prices.index"));
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
        $prices_type = Prices::where('id', $id)->first();
        $prices_type->fill($request->request->all());
        $prices_type->save();
        $output = array('success' => 'true');
        return response()->json($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prices_type = new Prices();
        $prices_type->destroy($id);
        return redirect(route("voyager.prices.index"));
    }
}
