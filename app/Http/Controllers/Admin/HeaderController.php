<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\Permission;
use App\Model\user\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Contracts\Validation\Factory;

class HeaderController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $headers=Header::all();
        return view('admin.header.show', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $header=Header::where('id',$id)->first();
        return view('admin.header.edit',compact('header'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $header=Header::where('id',$id)->first();
        $header->name=$request->name;
        $header->title=$request->title;
        $header->subtitle=$request->subtitle;

        if ($request->hasFile('logo')) {
            $path =  public_path().'/upload/header/';
            $file = $request->file('logo');
            $filename_1 = 'logo.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img = ImageInt::make($file);
            $img->save($path . $filename_1);
        }else{
            $temp=Header::where('id', $id)->first();
            $filename_1=$temp->logo;
            unset($temp);
        }

        if ( $request->hasFile('background_img') ) {
            $path =  public_path().'/upload/header/';
            $file = $request->file('background_img');
            $filename_2 = 'background_img.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img = ImageInt::make($file);
            $img->save($path . $filename_2);
        }else{
            $temp=Header::where('id', $id)->first();
            $filename_2=$temp->background_img;
            unset($temp);
        }
        $header->logo=$filename_1;
        $header->background_img=$filename_2;
        $header->save();

        return redirect(route('header.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
