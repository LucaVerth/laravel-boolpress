<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use PhpParser\Node\Stmt\ElseIf_;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::with(['category','tags'])->paginate(6);
        $category = Category::all();
        $tags = Tag::all();

        return response()->json(compact('post', 'category' , 'tags'));
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

    public function getCategoryPosts($category_slug)
    {
        $category = Category::where('slug', $category_slug)->with('posts.tags')->first();
        $success = true;
        $error = '';

        if(!$category){
            $success = false;
            $error = 'Category not found';
        }else if($category && count($category['posts']) === 0){
            $success = false;
            $error = 'No posts found for this Category';
        }
        return response()->json(compact('category', 'success', 'error'));
    }

    public function getTagPosts($tag_slug)
    {
        $tags = Tag::where('slug', $tag_slug)->with('posts.category')->first();
        $success = true;
        $error = '';

        if(!$tags){
            $success = false;
            $error = 'Tag not found';
        }else if($tags && count($tags['posts']) === 0){
            $success = false;
            $error = 'No posts found for this Tag';
        }
        return response()->json(compact('tags', 'success', 'error'));
    }
}
