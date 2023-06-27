<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index(User $author)
    {
        $terbaru = Blog::orderBy('updated_at', 'DESC')->limit('5')->get();
        $totalVisitors = Visitor::select('ip_address')->distinct()->count();
        $onlineUsers = DB::table('users', true)->SUM('is_online');
          
        return view('author',[
            'title' => 'Blog Author',
            'blog' => $author->blog->load('category', 'author'),
            'author' => User::all(),
            'terbaru' => $terbaru,
            'kategori' => Category::all(),
            'jumlah' => $totalVisitors,
            'online' => $onlineUsers


        ]);
    }
}
