<?php
namespace App\Services\Admin;

use App\Models\Admin\Sheets;
use Illuminate\Database\Eloquent\Model;
class SheetsService
{
    public function getAllData(){
        return Sheets::all();
    }

    public function getById($id){
        return Sheets::where('id', $id)->first();
    }

    public function getByKeyword($keyword){
        return Sheets::where('slug', $keyword)->first();
    }

    public function softDelete($id){
         Sheets::deleted($id);
    }

    public function update($id, $data){
        $sheets = Sheets::findOrFail($id);
        $sheets->fill($data);
        $sheets->save();
    }

    public function store($data){
        Sheets::create($data);
    }
}