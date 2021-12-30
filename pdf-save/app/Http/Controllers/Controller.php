<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Обновить аватар пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "pdfFile" => "required|mimes:pdf|max:10000"
        ],$messages = [
            'mimes' => 'Please insert pdf only',
            'max'   => 'File should be less than 10 MB'
        ]);

        if ( $validator->fails() ) {
            return $validator->errors();
        }

        $path = $request->file('pdfFile')->store('/', 's3');
        $url = Storage::disk('s3')->url($path);

        return $url;
    }
}
