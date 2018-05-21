<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::paginate(9);
        return view('admin.gallery', ['images' => $images]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
        ]);
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        $input['title'] = $request->title;
        Image::create($input);
        return back()
            ->with('message', 'Изображение добавлено');

    }

    public function destroy($id)
    {
        $image = Image::find($id);
        unlink(public_path('images') . '/' . $image->image);
        $image->delete();
        return back()
            ->with('message', 'Изображение удалено');
    }
}
