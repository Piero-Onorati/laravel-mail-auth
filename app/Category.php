<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // One to Many relation
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
