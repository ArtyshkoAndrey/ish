<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class tag extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Model\user\post','post_tags')->orderBy('created_at','DESC')->paginate(5);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->name, 0, 40));
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
