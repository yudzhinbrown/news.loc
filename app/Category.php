<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    public function articles(){
        return $this->belongsToMany('App\Article');
    }

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($this->title . '-' . Carbon::now()->format('dmiHi'), '-');
    }
}
