<?php
/**
 * Created by PhpStorm.
 * User: aser
 * Date: 30.01.2018
 * Time: 19:35
 */

namespace App\Services\Admin;

use App\Models\Admin\Doctor;
use App\Models\Admin\Sheet;
use App\Services\Admin\SheetsService;
class DoctorService
{
    public function sheet()
    {
        return $this->belongsToMany('App\Models\Admin\Sheet');
    }

    public function storeDoctorToSheet()
    {
        $doctor = new Doctor(['firstName' => 'Vasya', 'lastName' => 'Petrov', 'description' => 'test']);
        $sheet = Sheet::where('id', 8)->first();
        $sheet->doctors()->save($doctor);
    }

    public function storeData($data)
    {
        Doctor::create($data);
    }

    public function getAll()
    {
        return Doctor::all();
    }

    public function getById($id){
        return Doctor::findOrfail($id);
    }

    public function updateData($id, $data){
        $doctor = Doctor::findOrfail($id);
        $doctor->fill($data);
        $doctor->save();
    }

    public function deleteData($id){
        $doctor = Doctor::findOrfail($id);
        Doctor::findOrfail($id)->sheets()->detach();
        $doctor->delete();
    }
}