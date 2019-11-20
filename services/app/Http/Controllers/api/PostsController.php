<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function getPosts(Request $request) {
        $posts = Post::where('is_published', true);
        if(!empty($request->all()['category'])) {
            $posts = $posts->where('category_id', $request->all()['category']);
        }
        $res = $posts->select('title', 'image', 'text')->get();
        return response()->json($res);
    }
}
