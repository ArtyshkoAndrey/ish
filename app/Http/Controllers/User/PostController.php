<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\like;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category_post;
use App\Model\user\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post($slug)
    {
		$headers=$this->headers;
		$article=post::where('slug', $slug)->first();
		if(!is_null($article)) {
            $aside_articles = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
            $categories = category::all();
            $tags = tag::all();
            $article->addView();
            $next_post = post::where('id', '<', $article->id)->orderBy('id', 'desc')->first();
            $prev_post = post::where('id', '>', $article->id)->orderBy('id', 'asc')->first();
            if ($next_post == null) {
                $next_post = $article;
            }
            if ($prev_post == null) {
                $prev_post = $article;
            }
            $links=$this->links;
            return view('user.article', compact('article', 'aside_articles', 'categories', 'tags', 'next_post', 'prev_post', 'links', 'headers'));
        }
        else
            return redirect('/news');
    }

}
