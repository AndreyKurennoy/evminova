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
    public $sheetService;
    public function __construct(RatingService $ratingService,
                                SheetsService $sheetsService
                                )
    {
        $this->ratingService = $ratingService;
        $this->sheetService = $sheetsService;
    }

    public function showAllSitePages(View $view)
    {
//        $view->with('aboutMenus', Menu::all() );
//        $view->with('catalogSheets', Sheet::where(['status'=>1, 'category' => 2])->get());

    }

    public function showSlugRatings(View $view){
        $view->with('ratingSlug', $this->ratingService->getSlugRating(request()->path()));
    }

    public function showNewsMenu(View $view){
        $view->with('news_sheets', $this->sheetService->getAllPublishedNews());
    }

    public function showLechimMenu(View $view){
        $view->with('lechim_sheets', $this->sheetService->getAllPublishedLechim());
    }

    public function showInnerNewsMenu(View $view){
        $view->with('innerNews', $this->sheetService->getNewsInnerMenu());
    }

    public function showNewsFooter(View $view){
        $view->with('footerNews', $this->sheetService->getNewsFooter());
    }

    public function meta(View $view){
        $view->with('meta', $this->sheetService->getMeta(request()->path()));
    }

    public function headerAbout(View $view){
        $view->with('headerAbout', $this->sheetService->getHeaderAbout());
    }

    public function headerCatalog(View $view){
        $view->with('headerCatalog', $this->sheetService->getHeaderCatalog());
    }

    public function headerLechim(View $view){
        $view->with('headerLechim', $this->sheetService->getHeaderLechim());
    }

    public function headerProfilaktor(View $view){
        $view->with('headerProfilaktor', $this->sheetService->getHeaderProfilaktor());
    }

}