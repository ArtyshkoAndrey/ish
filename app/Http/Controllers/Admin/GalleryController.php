<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\gallery;
use Intervention\Image\Facades\Image as ImageInt;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = gallery::all();
        return view('admin.gallery.show',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.gallery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required',
            'photo'     => 'required',
            'posted_by' => 'required',
            'status'    => 'required',
        ]);
        if ($request->hasFile('photo')) {
            $path     = public_path().'/upload/gallery/';
            $file     = $request->file('photo');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . 'original/' . $filename);
            $img = ImageInt::make($file);
            $img->resize(null, 170, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . 'miniature/' . $filename);
        }else{
            return 'No';
        }
        $gallery            = new gallery;
        $gallery->photo     = $filename;
        $gallery->title     = $request->title;
        $gallery->status    = $request->status;
        $gallery->posted_by = $request->posted_by;
        $gallery->save();
        return redirect(route('gallery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = gallery::where('id',$id)->first();
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $path     = public_path().'/upload/gallery/';
            $file     = $request->file('photo');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . 'original/' . $filename);
            $img = ImageInt::make($file);
            $img->resize(null, 170, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . 'miniature/' . $filename);
        }else{
            $temp     = gallery::where('id', $id)->first();
            $filename = $temp->photo;
            unset($temp);
        }

        $gallery            = gallery::find($id);
        $gallery->title     = $request->title;
        $gallery->status    = $request->status;
        $gallery->photo     = $filename;
        $gallery->posted_by = $request->posted_by;
        $gallery->save();

        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = gallery::where('id',$id)->first();
        if(file_exists(public_path().'/upload/gallery/original/'.$gallery->photo))
            unlink(public_path().'/upload/gallery/original/'.$gallery->photo);
        if(file_exists(public_path().'/upload/gallery/miniature/'.$gallery->photo))
            unlink(public_path().'/upload/gallery/miniature/'.$gallery->photo);
        $gallery->delete();
        return redirect()->back();
    }
}
