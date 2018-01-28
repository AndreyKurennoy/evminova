<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetsRequest;
use Illuminate\Http\Request;
use App\Services\Admin\PagesService;
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
    public $pagesService;
    public $sheetsService;


    public function __construct(
        PagesService $pagesService,
        SheetsService $sheetsService
    )
    {
        $this->pagesService = $pagesService;
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
        return view('vendor.voyager.postsa.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetsRequest $request)
    {
//        dd($request->request->all());
        $this->sheetsService->store($request->request->all());
        return redirect(route("voyager.test.index"));
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
//        dd(route()->current());
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
//        $dataType = Voyager::model('DataType')->where('slug', '=', 'pages')->first();
//        $relationships = $this->getRelationships($dataType);
//
//        //Getting content of the row
//        $dataTypeContent =  DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name
////        $this->authorize()
//
//
//        $page_data = $this->pagesService->getPageData($id);
////        $page_data->created_at;
////        dd($page_data[0]->id);
////        dd(route('voyager.pages.edit'));
//        return view('vendor.voyager.pages.edit-add', ['page' => $page_data[0]]);

        $sheets = $this->sheetsService->getById($id);
        $edit = true;
//        dd($sheets);
        return view('vendor.voyager.postsa.edit', compact('sheets', 'edit'));
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
        return redirect(route("voyager.test.index"));
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
}
