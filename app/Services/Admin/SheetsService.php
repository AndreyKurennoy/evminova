<?php
namespace App\Services\Admin;

use App\Models\Admin\Doctor;
use App\Models\Admin\Sheet;
use Illuminate\Database\Eloquent\Model;
class SheetsService
{
    public function getAllData(){
        return Sheet::all();
    }

    public function getAllPublishedCatalog(){
        return Sheet::where(['category' => 2, 'status' => 1])->get();
    }

    public function getCatalogByKeywordPublished($keyword, $category){
        return Sheet::where(['slug'=> $keyword, 'category' => $category, 'status' => 1])->first();
    }

    public function getById($id){
        return Sheet::where('id', $id)->first();
    }

    public function getByKeyword($keyword){
        return Sheet::where('slug', $keyword)->first();
    }

    public function softDelete($id){
         Sheet::deleted($id);
    }

    public function update($id, $data){
        $sheets = Sheet::findOrFail($id);
        $sheets->fill($data);
        $sheets->save();
    }

    public function storeData($data){
        Sheet::create($data);
    }

    public function doctors(){
        return $this->belongsToMany('App\Models\Admin\Doctor');
    }
}