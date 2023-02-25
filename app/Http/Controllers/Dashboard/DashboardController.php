<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;

use App\Models\Blog;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Komentar;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $onlineUsers = DB::table('users', true)->SUM('is_online');
        $tren = DB::table('blogs')
            ->orderBy('views', 'desc')
            ->limit(10) // Batasi hanya 5 postingan terpopuler yang ditampilkan
            ->get();
        
       
        return view('dashboard/home/index', [
            'blogtotal' => Blog::count(),
            'downloadtotal' => Download::count(),
            'usertotal' => User::count(),
            // 'visitortotal' => $totalvisitor,
            'terbaru' => $tren,
            'online' => $onlineUsers,
            'user' => User::all(),
            'komentar' => Komentar::all(),
            'blogs' => Blog::all()
        ]);
    }
}
