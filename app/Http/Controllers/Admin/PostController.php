<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageInt;
use Illuminate\Contracts\Validation\Factory;

class PostController extends Controller
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
        $posts = post::orderby('id', 'desc')->get();
        return view('admin.post.show',compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags        = tag::all();
            $categories = category::all();
            return view('admin.post.post',compact('tags','categories'));
        }
        return redirect(route('admin.home'));
        
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
            'title'            => 'required',
            'subtitle'         => 'required',
            'body'             => 'required',
            'image'            => 'required',
            'posted_by'        => 'required',
            'meta_keywords'    => 'required',
            'meta_description' => 'required',
            ]);
        if ($request->hasFile('image')) {
            $path     = public_path().'/upload/post_header/';
            $file     = $request->file('image');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . $filename);
        }else{
            return 'No';
        }
        $post                   = new post;
        $post->image            = $filename;
        $post->title            = $request->title;
        $post->subtitle         = $request->subtitle;
        $post->slug             = $request->slug;
        $post->body             = $request->body;
        $post->status           = $request->status;
        $post->top              = $request->top;
        $post->posted_by        = $request->posted_by;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords    = $request->meta_keywords;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
            $post       = post::with('tags','categories')->where('id',$id)->first();
            $tags       = tag::all();
            $categories = category::all();
            return view('admin.post.edit',compact('tags','categories','post'));
        }
        return redirect(route('admin.home'));
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
            'title'            => 'required',
            'subtitle'         => 'required',
            'body'             => 'required',
            'meta_keywords'    => 'required',
            'meta_description' => 'required',
            ]);
        if ($request->hasFile('image')) {
            $path     = public_path().'/upload/post_header/';
            $file     = $request->file('image');
            $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
            $img      = ImageInt::make($file);
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path . $filename);
        }else{
            $temp     = post::where('id', $id)->first();
            $filename = $temp->image;
            unset($temp);
        }
        $post                   = post::find($id);
        $post->image            = $filename;
        $post->title            = $request->title;
        $post->subtitle         = $request->subtitle;
        $post->body             = $request->body;
        $post->status           = $request->status;
        $post->top              = $request->top;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords    = $request->meta_keywords;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = post::where('id',$id)->first();
        if(file_exists(public_path().'/upload/post_header/'.$post->image))
            unlink(public_path().'/upload/post_header/'.$post->image);
        $post->delete();
        return redirect()->back();
    }

    public function uploadimg(Request $request, Factory $validator)
    {
        $v = $validator->make($request->all(), [
            'upload' => 'required|image',
        ]);

        $funcNum = $request->input('CKEditorFuncNum');

        if ($v->fails()) {
            return response(
                "<script>
                    window.parent.CKEDITOR.tools.callFunction({$funcNum}, '', '{$v->errors()->first()}');
                </script>"
            );
        }

        $path     = public_path().'/upload/post/';
        $file     = $request->file('upload');
        $filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'jpg';
        $img      = ImageInt::make($file);
        $img->resize(null, 500, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path . $filename);
        $url = asset('/upload/post/' . $filename);

        return response(
            "<script>
                window.parent.CKEDITOR.tools.callFunction({$funcNum}, '{$url}', 'Изображение успешно загружено');
            </script>"
        );
    }
}
