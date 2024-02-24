<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function handleUpload($request = null, $data = null, $path = "public")
    {
        $all = [];
        if (is_null($request)) {
            $request = request();
        }
        foreach ($request->allFiles() as $key => $value) {
            if (!is_null($data) && !is_null($data->$key)) {
                Storage::delete($data->$key);
            }
            $all[$key] = Storage::url($request->file($key)->store($path));
        }
        return $all;
    }
}
