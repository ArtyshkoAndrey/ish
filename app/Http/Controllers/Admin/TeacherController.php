<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageInt;
use App\Model\user\teacher;

class TeacherController extends Controller
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
        $teachers = teacher::all();
        return view('admin.teacher.show',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.teacher');
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
            'name'       => 'required',
            'profession' => 'required',
            'content'    => 'required',
            'photo'      => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $path     = public_path().'/upload/teacher/';
            $file     = $request->file('photo');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 350, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . $filename);
        }else {
            return 'No';
        }

        $teacher             = new teacher;
        $teacher->name       = $request->name;
        $teacher->content    = $request->content;
        $teacher->profession = $request->profession;
        $teacher->photo      = $filename;
        $teacher->save();

        return redirect(route('teacher.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = teacher::where('id',$id)->first();
        if(file_exists(public_path().'/upload/teacher/'.$teacher->photo))
            unlink(public_path().'/upload/teacher/'.$teacher->photo);
        $teacher->delete();
        return redirect()->back();
    }
}
