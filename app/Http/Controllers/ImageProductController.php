<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageProductController extends Controller
{
    //
    public function update(Request $request)
    {
        $path = $request->file('file')->store('images');

        return $path;
    }
}
