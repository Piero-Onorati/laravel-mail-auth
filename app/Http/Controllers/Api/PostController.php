<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(4);

        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category','tags'])->first();

        if($post){

            if ($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            }

            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        }

        return response()->json([
            'success' => false,
            'results' => 'There are no posts'
        ]);
    }

    
}
