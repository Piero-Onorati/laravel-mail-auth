<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function category(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function tags(){
        $tags = Tag::all();
        return view('admin.tags', compact('tags'));
    }
}
