<?php

namespace App\Services\Admin;

use App\Models\Admin\MainOptions;

class MainOptionsService
{
    public function getPageOptions($page){
        return MainOptions::where('page', $page)->get();
    }

    public function update($data){
        $options = MainOptions::where('page', 'home')->get();
        foreach($options as $option){
            $option->value;
        }

        return $options;
    }
}