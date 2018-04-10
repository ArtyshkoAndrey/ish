<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;

class SitemapController extends Controller
{

    public function index()
    {
        $posts = post::where('status', 1)->orderBy('updated_at', 'desc')->get();
        $categories = category::all();
        $tags=tag::all();

        return response()->view('sitemap', [
            'posts' => $posts,
            'categories'=>$categories,
            'tags'=>$tags,
        ])->header('Content-Type', 'text/xml');
    }
}
