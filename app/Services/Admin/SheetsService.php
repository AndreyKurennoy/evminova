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
        $sheet = Sheet::where('id', $id)->first();
        $sheet->delete();
    }

    public function update($id, $data){
        $sheets = Sheet::findOrFail($id);
        $sheets->fill($data);
        $sheets->doctors()->detach();
        $doctor = [];

        foreach($data['doctor'] as $doctor_row)
        {
            $doctor[] = Doctor::findOrFail($doctor_row);
        }
        $sheets->save();
        $sheets->doctors()->saveMany($doctor);
    }

    public function storeData($data){
//        $sheet = Sheet::create($data);
        $sheet = new Sheet;
        $sheet->fill($data);
        $sheet->category_name = 'catalog';
        $sheet->save();

        $doctor = [];

        foreach($data['doctor'] as $doctor_row)
        {
            $doctor[] = Doctor::findOrFail($doctor_row);
        }
        $sheet->doctors()->saveMany($doctor);
    }

    public function storeAbout($data){
        $sheet = new Sheet;
        $sheet->fill($data);
        $sheet->category_name = 'about';
        $sheet->save();
    }

    public function updateAbout($data, $id){
        $sheets = Sheet::findOrFail($id);
        $sheets->fill($data);
        $sheets->category_name = 'about';
        $sheets->save();
    }

//    public function doctors(){
//        return $this->belongsToMany('App\Models\Admin\Doctor');
//    }
    public function savePage($data){
//        dd($data);
        $sheets = Sheet::where('slug', $data['slug'])->first();
        if (!empty($sheets)){
            $sheets->fill($data);
            $sheets->status = 1;
            $sheets->save();
        }else{
            $sheets = new Sheet();
            $sheets->fill($data);
            $sheets->status = 1;
            $sheets->save();
        }
    }

}