<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'slug',
        'content',
        'category_id',
        'cover'
    ];

    // One to Many relation
    public function category(){
        return $this->belongsTo('App\Category');
    }

    // Many to Many relation
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
