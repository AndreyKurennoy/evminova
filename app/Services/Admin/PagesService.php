<?php

namespace App\Services\Admin;

use App\Models\Admin\Pages;

class PagesService {
    public function getPageData($id){
        return Pages::where('id', $id)->get();
    }
}