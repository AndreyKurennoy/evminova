<?php

namespace App\Services;

use App\Models\Gallery;

class GalleryService {
    public function storeData($data, $type, $url = null)
    {
        $i = 0;

        Gallery::where(['type' => $type, 'url' => $url])->delete();
        foreach ($data['photo'] as $photo){
            if(!empty($photo)) {
                $photo_arr = explode('/', $photo);
                $photo_name = end($photo_arr);

                $image = new Gallery([
                    'name' => $photo,
                    'alt' => $data['alt'][$i],
                    'type' => $type,
                    'thumb' => '/storage/thumbs/' . $photo_name,
                    'url' => $url,
                    'description' => $data['description'][$i]
                ]);
                $image->save();

                $i++;
            }
        }
    }

    public function findbyName($name, $type){
        $photo = Gallery::where(['name' => $name, 'type' => $type])->first();
        return $photo;
    }

    public function getbyType($type)
    {
        $photos = Gallery::where('type', $type)->get();
        return $photos;
    }
}