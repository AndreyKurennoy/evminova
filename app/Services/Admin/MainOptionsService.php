<?php

namespace App\Services\Admin;

use App\Models\Admin\MainOptions;

class MainOptionsService
{

    public function create($page, $key, $input){
        MainOptions::create(['page' => $page, 'option_name' => $key, 'value' =>  $input]);
    }
    public function getPageOptions($page){
        return MainOptions::where('page', $page)->get();
    }

    public function update($inputs, $page){
        unset($inputs['_token']);
        foreach ($inputs as $key => $input){
            if ($input !== null) {
                $option = MainOptions::where(['page' => $page, 'option_name' => $key])->first();

                if($option !== null){
                    $option->value = $input;
                    $option->save();
                }else {
                    $this->create($page, $key, $input);
                }
            }
        }

        $options = MainOptions::where('page', 'home')->get();
        foreach($options as $option){
            $option->value;
        }

        return $options;
    }

    public function profPhoto(){
        return MainOptions::where(['page' => 'services', 'option_name' => 'photo'])->first();
    }
}