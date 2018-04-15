<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Contracts\Validation\Factory;

class UserController extends Controller
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
        
        $users = admin::all();
        return view('admin.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('admin.user.create',compact('roles'));
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:admins',
            'phone'    => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        if ($request->hasFile('photo')) {
            $path     = public_path().'/upload/admin/photo/';
            $file     = $request->file('photo');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . $filename);
            $request['photo'] = $filename;
        }else{
            $request['photo'] = "avatar.png";
            $filename = "avatar.png";
        }

        $request['password'] = bcrypt($request->password);
        $user                = admin::create($request->all());
        $userPhoto = admin::orderby('id', 'decs')->first();
        admin::where('id', $userPhoto->id)->update(['photo'=> $filename]);
        unset($userPhoto);
        $user->roles()->sync($request->role);
        return redirect(route('user.index'));
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
        $user  = admin::find($id);
        $roles = role::all();
        if($user->photo == null) {
            $user->photo = "avatar.png";
        }
        return view('admin.user.edit',compact('user','roles'));
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
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
        ]);

        if ($request->hasFile('photo')) {
            $path     = public_path().'/upload/admin/photo/';
            $file     = $request->file('photo');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . $filename);
        }else{
            $filename=admin::where('id', $id)->value('photo');
        }

        $request->status?: $request['status'] = 0;
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        $user = admin::where('id',$id)->first();
        $user->photo = $filename;
        $user->save();
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back()->with('message','User is deleted successfully');
    }
}
