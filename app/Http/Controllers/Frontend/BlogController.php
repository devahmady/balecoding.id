<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Like;
use App\Models\Visitor;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Helpers\UserSystemInfoHelper;
use App\Models\Category;
use App\Models\Support;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index()
    {
        $onlineUsers = DB::table('users', true)->SUM('is_online');

        $totalVisitors = Visitor::select('hits')->distinct()->count();
        $terbaru = Blog::orderBy('updated_at', 'DESC')->limit('5')->get();
        $tren = DB::table('blogs')
        ->orderBy('views', 'desc')
        ->limit(3) // Batasi hanya 5 postingan terpopuler yang ditampilkan
        ->get();
        
        return view('frontend/home/blog', [
            'title' => 'halaman home',
            'blogs' => Blog::with('like')->latest()->search()->paginate(10),
            'getip' => UserSystemInfoHelper::get_ip(),
            'getbrowser' => UserSystemInfoHelper::get_browsers(),
            'getdevice' => UserSystemInfoHelper::get_device(),
            'getos' => UserSystemInfoHelper::get_os(),
            'komentar' => Komentar::all(),
            'jumlah' => $totalVisitors,
            'terbaru' => $terbaru,
            'trend' => $tren,
            'kategori' => Category::all(),
            'online' => $onlineUsers,
            'support' => Support::all()

            
        ]);
    }

    public function show(Blog $blog)
    {
        $totalVisitors = Visitor::select('ip_address')->distinct()->count();
        $terbaru = Blog::orderBy('updated_at', 'DESC')->limit('5')->get();
        $onlineUsers = DB::table('users', true)->SUM('is_online');

        // $blog = Blog::find($blog->id);
        $blog->increment('views');
        return view('frontend/home/posts', [
            'title' => 'halaman post',
            'data1' => $blog,
            'jumlah' => $totalVisitors,
            'blogs' => Blog::with('like')->latest()->search()->paginate(10),
            'views' => $blog->views,
            'kategori' => Category::all(),
            'terbaru' => $terbaru,
            'online' => $onlineUsers
        

        ]);
    }

    public function like($blog_id)
    {
        // return $blog_id;

        // $like = Like::get();
        $data = Like::where('blog_id','=',$blog_id)->first();
        if($data == null){
            
            $like = new Like();
            // $count = 0;
            $like->blog_id = $blog_id;
            $like->count = 1;
            $like->save();
            return redirect()->back();
        }else{
            
            // return $data->count;
            $data->count+=1;
            $data->update();
            return redirect()->back();
           
        }




        // $oldlikes = Like::where('blog_id', '=', $blog_id)->first();
        // return $oldlikes;
        // $oldlikesCount =  count($oldlikes);
        // if ($oldlikesCount > 0) {
        //     $data = Like::find($oldlikes[0]->id);
        //     $data->delete();
        // }
        // $like = new Like;
        // $like->blog_id = $blog_id;
        // $like->user_id = $request->user()->id;
        // $like->save();
        // return Redirect()->back();
    }

    public function hits()
    {
        $visitor = Visitor::where('ip_address', request()->ip())->first();
        $visitor->hits++;
        $visitor->save();
        $hits = $visitor->hits;
        $jumlah = Visitor::select('ip_address')->distinct()->count();

        return view('frontend/home/posts', compact('hits','jumlah'));
    }
}
