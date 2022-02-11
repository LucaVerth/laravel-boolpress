<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::with(['category','tags'])->paginate(5);

        return response()->json($post);
    }

    public function show($slug)
    {
        $postDetail = Post::where('slug', $slug)->with(['category','tags'])->first();

        if(!$postDetail){
            $postDetail = [
                'title' => 'No posts Found',
                'content' => '',
            ];
        }

        return response()->json($postDetail);
    }
}
