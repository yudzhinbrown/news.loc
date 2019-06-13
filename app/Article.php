<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{

    protected $fillable = ['title', 'slug', 'published', 'text', 'meta_description', 'meta_keyword', 'img'];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($this->title . '-' . Carbon::now()->format('dmiHi'), '-');
    }

}
