<?php

namespace Modules\Backend\Services;

use Modules\Backend\Helpers\FunctionHelper;

class FileService
{
    public function upload($data = [], $public = 'attach-file')
    {
        $files = $data != [] ? $data : ($_FILES != [] ? $_FILES : []);
        $sDir = base_path('public') . chr(92) . $public . chr(92);
        $folder = FunctionHelper::createFolder($sDir, date('Y'), date('m'), date('d'));
        $result = [];
        if($files != []){
            $i = 0;
            foreach($files as $key => $file){
                $filename = $file['name'];
                $filename = FunctionHelper::replaceBadChar($filename);
                $filename = FunctionHelper::convertVNtoEN($filename);
                $filename = date('YmdHis') . '_' . uniqid() . '!~!' . $filename;
                $fullname = $folder . $filename;
                copy($file['tmp_name'], $fullname);
                $result[$i] = [
                    'name' => $file['name'],
                    'url' => url($public) . '/' . date('Y/m/d') . '/' . $filename,
                    'base_path' => $fullname,
                    'size' => $file['size'],
                ];
                $i++;
            }
        }
        return $result;
    }
}