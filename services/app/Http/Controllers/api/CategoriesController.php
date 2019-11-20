<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function getCategories() {
        $categories = Category::select('uuid', 'title', 'description')->withCount('posts')->orderBy("posts_count", "DESC")->get();
        return response()->json($categories);
    }
}
