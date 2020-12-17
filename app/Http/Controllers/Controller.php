<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function usercan($permission)
    {
        return Gate::allows($permission);
    }

    function uploadImage($obj, $request){
        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('public/images');
            $obj->image = $pathImage;
        }
    }
}
