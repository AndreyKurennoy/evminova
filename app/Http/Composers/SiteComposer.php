<?php
namespace App\Http\Composers;

use App\Models\Admin\Sheet;
use App\Services\Admin\RatingService;
use App\Services\Admin\SheetsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\Menu;

class SiteComposer
{
    public $ratingService;
    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function showAllSitePages(View $view)
    {
//        $view->with('aboutMenus', Menu::all() );
//        $view->with('catalogSheets', Sheet::where(['status'=>1, 'category' => 2])->get());

    }

    public function showSlugRatings(View $view){
        $view->with('ratingSlug', $this->ratingService->getSlugRating(request()->path()));
    }
}