<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Visitor;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $totalVisitors = Visitor::select('ip_address')->distinct()->count();
        $terbaru = Blog::orderBy('updated_at', 'DESC')->limit('5')->get();
        $onlineUsers = DB::table('users', true)->SUM('is_online');

        return view('frontend/home/category',[
            'title' => $category->name,
            'blog' => $category->blog->load('category', 'author'),
            'blogs' => Blog::all(), 
            'jumlah' => $totalVisitors,
            'terbaru' => $terbaru,
            'category' => $category->name,
            'kategori' => Category::all(),
            'online' => $onlineUsers
        ]);
    }
}
