<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Image::paginate(9);
        return view('site.gallery', ['images' => $images]);
    }
}
