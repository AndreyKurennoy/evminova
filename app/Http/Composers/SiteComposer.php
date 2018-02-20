<?php
namespace App\Http\Composers;

use App\Models\Admin\Sheet;
use App\Services\Admin\SheetsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\Menu;

class SiteComposer
{
    public function showAllSitePages(View $view)
    {
//        $view->with('aboutMenus', Menu::all() );
//        $view->with('aboutSheets', Sheet::where(['status'=>1, 'category' => 2])->get());
    }
}