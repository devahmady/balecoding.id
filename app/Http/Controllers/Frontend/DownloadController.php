<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $terbaru = Blog::orderBy('created_at')->limit('5')->get();
        $onlineUsers = DB::table('users', true)->SUM('is_online');

        return view('download', [
            'title' => 'halaman download',
            'downloads' => Download::all(),
            'blogs' => Blog::all(),
            'terbaru' => $terbaru,
            'kategori' => Category::all(),
            'online' => $onlineUsers
        ]);
    }

    public function download($id)
    {
        $data = Download::findOrFail($id);
        
        if($data == null){
            
            $like = new Download();
            // $count = 0;
            $like->id = $id;
            $like->count = 1;
            $like->save();
            $filePath = public_path('storage/file-download/' . $data->file);

            return response()->download($filePath);
        }else{
            
            // return $data->count;
            $data->count+=1;
            $data->update();
            $filePath = public_path('storage/file-download/' . $data->file);

            return response()->download($filePath);
           
        }
       

        
    }

    
}
