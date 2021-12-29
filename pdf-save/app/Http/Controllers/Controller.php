<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Обновить аватар пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function upload(Request $request)
    {

        // проверить что пришел pdf
        // приверить пришел ли вообще файл


//        $path = $request->file('pdfFile')->store('/', 's3');
        $path = $request->file('pdfFile')->store('/', 's3');
        $url = Storage::disk('s3')->url($path);

        return $url;



    }
}
