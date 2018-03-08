<?php

namespace App\Http\Controllers;

use App\Services\Admin\SheetsService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public $sheetsService;

    public function __construct(SheetsService $sheetsService)
    {

        $this->sheetsService = $sheetsService;
    }

    public function index()
    {
        $sheets = $this->sheetsService->getSheetByCategoryName('profilaktor');
        $currentSheet = $this->sheetsService->getByKeyword('question');
        return view('profilaktor', compact('sheets', 'currentSheet'));
    }

    public function show($keyword){
        $sheets = $this->sheetsService->getSheetByCategoryName('profilaktor');
        $currentSheet = $this->sheetsService->getByKeyword($keyword);
        return view('profilaktor', compact('sheets', 'currentSheet'));
    }


}
