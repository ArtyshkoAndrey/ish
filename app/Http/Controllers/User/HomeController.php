<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\gallery;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use App\Model\user\Header;
use App\Model\user\course;
use App\Model\user\plan;
use App\Model\user\teacher;
use App\Model\user\about;

class HomeController extends Controller {

    public function index() {
        $headers=$this->headers;
        $courses=course::all();
        $plansEight=plan::where('class', 8)->get();
        $plansTen=plan::where('class', 10)->get();
        $teachers=teacher::all();
        $about=about::all();
        $galleries = gallery::where('status', 1)->get();
        $links=$this->links;
        return view('user.index', compact('headers', 'courses', 'plansEight', 'plansTen', 'teachers', 'galleries', 'about', 'links'));
    }

    public function news()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8'); // Пробовал любые варианты написания 'ru_RU'
        Date::setLocale(config('app.locale')); // 'locale' => 'ru'
    	$articles = post::where('status',1)->orderBy('created_at','DESC')->paginate(6);
        $aside_articles = post::where('status',1)->orderBy('created_at','DESC')->paginate(3);
        $tags=tag::all();
        $links=$this->links;
        $categories = category::all();
        $headers=$this->headers;
        $top_post = post::orderby('id', 'desc')->where('status', 1)->where('top', 1)->first();
    	return view('user.news',compact('articles', 'aside_articles', 'categories', 'tags', 'top_post', 'links', 'headers'));
    }
    public function tag(tag $tag)
    {
        $articles = $tag->posts();
        $aside_articles = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
        $tags = tag::all();
        $links=$this->links;
        $headers=$this->headers;
        $categories = category::all();
        return view('user.news', compact('articles', 'aside_articles', 'categories', 'tags', 'links', 'headers'));
    }

    public function category(category $category)
    {
        $headers=$this->headers;
        $articles = $category->posts();
        $aside_articles = post::where('status',1)->orderBy('created_at','DESC')->paginate(3);
        $tags=tag::all();
        $links=$this->links;
        $categories = category::all();
        return view('user.news',compact('articles', 'aside_articles', 'categories', 'tags', 'links', 'headers'));
    }

    public function search(request $request) {
        if(isset($request->search)) {
            $articles = post::where('title', 'LIKE', '%' . $request->search . '%')->paginate(6);
            $aside_articles = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
            $tags = tag::all();
            $categories = category::all();
            $links=$this->links;
            $headers=$this->headers;
            return view('user.news', compact('articles', 'aside_articles', 'categories', 'tags', 'links', 'headers'));
        }
        else {
            return redirect('/news');
        }
    }
}
