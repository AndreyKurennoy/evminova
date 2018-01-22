<?php
namespace App\Services\Admin;

use App\Models\Admin\Sheets;

class SheetsService
{
    public function getAllData(){
        return Sheets::all();
    }

    public function getById($id){
        return Sheets::where('id', $id)->first();
    }

    public function softDelete($id){
         Sheets::deleted($id);
    }
}