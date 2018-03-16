<?php
namespace App\Services\Admin;

use App\Models\Admin\Doctor;
use App\Models\Admin\MainOptions;
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

    public function getAllPublishedNews(){
        return Sheet::where(['category' => 3, 'status' => 1])->get();
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

    public function getByKeywordPublished($keyword){
        return Sheet::where(['slug'=> $keyword, 'status' => 1])->first();
    }

    public function softDelete($id){
        $sheet = Sheet::where('id', $id)->first();
        $sheet->delete();
    }

    public function updateOnly($data, $id)
    {
        $sheets = Sheet::findOrFail($id);
        $sheets->fill($data);
        $sheets->save();
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
        $sheet = new Sheet;
        $sheet->fill($data);
        $sheet->category_name = 'catalog';
        $sheet->save();
        $id = $sheet->id;
        $doctor = [];

        foreach($data['doctor'] as $doctor_row)
        {
            $doctor[] = Doctor::findOrFail($doctor_row);
        }
        $sheet->doctors()->saveMany($doctor);
        return $id;
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

    public function savePage($data){
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
        return $sheets->id;
    }

    public function getSheetByCategoryName($name){
        return $sheets = Sheet::where('category_name', $name)->get();
    }

    public function getMeta($slug)
    {

        $slug_arr = explode('/', $slug);
        $meta_collection = $this->getByKeyword(end($slug_arr));
        $meta = [];

        if ($meta_collection){
        $meta['title'] = $meta_collection->seo_title;
        $meta['description'] = $meta_collection->meta_description;
        $meta['keywords'] = $meta_collection->meta_keywords;
        $meta['h1'] = $meta_collection->title;
        } else {
            $slug_new = '';
            switch ($slug){
                case 'catalog':
                    $slug_new = 'services';
                    break;
                case '/':
                    $slug_new = 'home';
                    break;
                case 'lechim':
                    $slug_new = 'services-news';
                    break;
                default:
                    $slug_new = $slug;
            }

            if (!empty($slug_new)){
                $main_options = MainOptions::where('page', $slug_new)->get();
                $meta['title'] = $main_options->where('option_name', 'seo_title')->pluck('value')->first();
                $meta['description'] = $main_options->where('option_name', 'meta_description')->pluck('value')->first();
                $meta['keywords'] = $main_options->where('option_name', 'meta_keywords')->pluck('value')->first();
                $meta['h1'] = $main_options->where('option_name', 'title')->pluck('value')->first();
            }
        }
        return $meta;

    }
}