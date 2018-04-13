<?php

namespace App\Model\user;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Model\user\like');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function scopeLastArticles($query, $count) {
        return $query->orderBy('created_at', 'desc')->take($count)->get();

    }
    
    public function addView(int $amount = 1)
    {
        $this->timestamps = false;
        $this->viewed    += $amount;
        $this->update();
        $this->timestamps = true;
        return $this;
    }

    public function adminName()
    {
        return $this->belongsTo('App\Model\admin\admin', 'posted_by');
    }
}
