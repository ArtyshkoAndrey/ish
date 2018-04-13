<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use App\Model\user\category_post;
use Carbon\Carbon;
use Illuminate\Support\Str;

class category extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\post','category_posts')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
    public function article($id)
    {
        return category_post::where('category_id', $id)->count();
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->name, 0, 40));
    }

}
