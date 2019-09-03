<?php

namespace App\Traits;

trait ImageUpload
{

    private function UploadFile($fileInfo = null, $fpath = null)
    {
        //Get Image name
        $fileName = $fileInfo->getClientOriginalName();
        $move_file = explode('.', $fileName);
        $fileName = str_random(8) . "." . $move_file[1];

        //Define Uplode path====
        $uploadPath = $fpath;
        //move to Define folder and Check its pass to move
        if ($fileInfo->move($uploadPath, $fileName)) {
            return $fileUrl = $fileName;
        } else {
            return $fileUrl = ' ';
        }
    }


}


?>