<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

    public function category() {
    	return $this->belongsTo('App\Category');
    }

    protected $fillable = [
    	'title','category_id','featured','content','slug'
    ];

    protected $dates = ['deleted_at'];
    
    public function getFeaturedAttribute($featured) {
    	return asset($featured);
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
