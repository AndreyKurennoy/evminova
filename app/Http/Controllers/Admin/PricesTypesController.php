<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\PricesTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricesTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices_types = PricesTypes::all();
        return view('vendor.voyager.prices.typesbrowse', compact('prices_types'));
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
        $type = new PricesTypes();
        $type->fill($request->request->all());
        $type->save();
        $output = array('success' => 'true');
        return response()->json($output);
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
        $prices_type = PricesTypes::where('id', $id)->first();
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
        $prices_type = PricesTypes::where('id', $id)->first();
        $prices_type->destroy($id);
        return redirect(route("voyager.pricestypes.index"));
    }
}
