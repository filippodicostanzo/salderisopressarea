<?php

namespace App\Http\Controllers\Auth;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function gallery($request)
    {

        $gallery = Gallery::where('id_code', '=', $request)->first();
        if ($gallery) {
            $photos = explode(',', $gallery->images);
            return view('front.galleries.single', ['gallery' => $gallery, 'photos' => $photos]);
        } else {
            abort(404);
        }
    }
}
