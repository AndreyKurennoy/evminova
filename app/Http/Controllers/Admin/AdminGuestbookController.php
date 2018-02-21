<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use App\Models\Admin\Review;
use App\Services\Admin\ReviewService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGuestbookController extends Controller
{

    public $reviewService;

    public function __construct(
        ReviewService $reviewService
    )
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('vendor.voyager.guestbook.browse', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.voyager.guestbook.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $this->reviewService->storeData($request->request->all());
        return redirect(route("voyager.guestbook.index"));
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
        $review = Review::findOrFail($id);
        return view('vendor.voyager.guestbook.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, $id)
    {
        $this->reviewService->updateById($id, $request->request->all());
        return redirect(route("voyager.guestbook.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->reviewService->deleteById($id);
        return redirect(route("voyager.guestbook.index"));
    }
}
