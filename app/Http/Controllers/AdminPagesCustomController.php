<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetsRequest;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;
use App\Services\Admin\DoctorService;
use App\Services\Admin\SheetsService;

//Voyager staff
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use TCG\Voyager\Traits\AlertsMessages;
class AdminPagesCustomController extends Controller
{

    use BreadRelationshipParser;
    public $doctorService;
    public $sheetsService;


    public function __construct(
        DoctorService $doctorService,
        SheetsService $sheetsService
    )
    {
        $this->doctorService = $doctorService;
        $this->sheetsService = $sheetsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = $this->sheetsService->getAllData();
        return view('vendor.voyager.postsa.browse', compact('sheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $doctors = $this->doctorService->getAll();
        return view('vendor.voyager.postsa.add', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetsRequest $request)
    {
        $id = $this->sheetsService->storeData($request->request->all());
        return redirect(route("voyager.test.edit", $id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sheets = $this->sheetsService->getById($id);
        $show = true;
        return view('vendor.voyager.postsa.read', compact('sheets', 'show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $sheets = $this->sheetsService->getById($id);
        $doctors = $this->doctorService->getAll();
        $exist_doctors = $sheets->doctors->all();
        return view('vendor.voyager.postsa.edit', compact('sheets',  'doctors', 'exist_doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SheetsRequest $request, $id)
    {
        $this->sheetsService->update($id,$request->request->all());
        return redirect(route("voyager.test.edit", $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sheetsService->softDelete($id);
//        redirect('voyager.test.index');
    }

    public function savePage(Request $request){
        $this->sheetsService->savePage($request->request->all());
    }
}
