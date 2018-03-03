<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Services\Admin\SheetsService;
use App\Services\Admin\DoctorService;

class AdminDoctorsController extends Controller
{
    public $sheetsService;
    public $doctorService;

    public function __construct(
        SheetsService $sheetsService,
        DoctorService $doctorService
    )
    {
        $this->sheetsService = $sheetsService;
        $this->doctorService = $doctorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->doctorService->getAll();
//        dd($doctors);
        return view('vendor.voyager.doctors.browse', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.voyager.doctors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $this->doctorService->storeData($request->request->all());
        return redirect(route("voyager.doctor.index"));
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
        $doctor = $this->doctorService->getById($id);

        return view('vendor.voyager.doctors.edit', compact('doctor'));
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
//        dd($request->request->all());
        $this->doctorService->updateData($id, $request->request->all());
        return redirect(route("voyager.doctor.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd(123);
        $this->doctorService->deleteData($id);
//        return redirect(route('voyager.doctor.index'));
    }
}
