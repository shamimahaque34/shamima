<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $blogs;
    public function index($id)
    {
        $this->blogs = Blog::where('category_id', $id)->Paginate(3);
        return view('front.category', ['blogs' => $this->blogs, 'category' => Category::find($id)]);
    }
}

