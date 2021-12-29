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
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
//        $path = $request->file('avatar')->store('avatars');
//        $path = Storage::putFile('avatars', $request->file('avatar'));


//        $path = Storage::disk('s3')->put('/baz.txt', 'some content', 'public');
        $path = Storage::disk('s3')->put('hello.txt', 'check text');


        return $path;
    }
}
