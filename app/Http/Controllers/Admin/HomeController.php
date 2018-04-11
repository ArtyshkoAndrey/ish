<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category_post;
use App\Model\user\category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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


    public function index()
    {
        $posts        = post::where('status', 1)->get();
        $count_posts  = $posts->count();
        $viewed_posts = 0;
        foreach ($posts as $post) {
            $viewed_posts += $post->viewed;
        }
        $popular_post = post::orderBy('viewed', 'desc')->first();

        $url = 'https://api-metrika.yandex.ru/stat/v1/data';
        $params = [
            'id'          => '48277403',
            'oauth_token' => 'AQAAAAAS8A4OAATXkrURU0UShUYyhXsxNBRYanA',
            'metrics'     => 'ym:s:visits,ym:s:pageviews,ym:s:users',
            'dimensions'  => 'ym:s:date',
            'date1'       => '30daysAgo',
            'date2'       => 'yesterday',
            'sort'        => 'ym:s:date',
        ];
        $json = file_get_contents( $url . '?' . http_build_query($params) );
        $data = json_decode($json, true)['data'];
        if($posts == null) {
            $posts        = 0;
            $count_posts  = 0;
            $viewed_posts = 0;
        }
        if($data == null) {
            $highcharts = false;
            return view('admin/home', compact('count_posts', 'viewed_posts', 'popular_post', 'highcharts'));

        }
        else {
            $tmpdata = [];
            foreach ($data as $item) {
                $tmpdata['visits'][]     = $item['metrics'][0];
                $tmpdata['pageviews'][]  = $item['metrics'][1];
                $tmpdata['users'][]      = $item['metrics'][2];
                $tmpdata['categories'][] = $item['dimensions'][0]['name'];
            }
            $categories = json_encode($tmpdata['categories'], JSON_UNESCAPED_UNICODE);
            $series = json_encode([
                ['name' => 'Визиты', 'data'     => $tmpdata['visits']],
                ['name' => 'Просмотры', 'data'  => $tmpdata['pageviews']],
                ['name' => 'Посетители', 'data' => $tmpdata['users']]
            ], JSON_UNESCAPED_UNICODE);
            $highcharts = true;
            return view('admin/home', compact('count_posts', 'viewed_posts', 'popular_post', 'series', 'categories', 'highcharts'));
        }
    }
}
