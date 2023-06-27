<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;


use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBlogController extends Controller
{

    public function index()
    {
        return view('dashboard/blog/index', [
            'blog' => Blog::where('user_id', auth()->user()->id)->paginate(10),
            'jumlah' => Blog::count()
        ]);
    }


    public function create()
    {
        return view('dashboard/blog/create', [
            'category' => Category::all(),
            // 'tag' => Tag::all()
        ]);
    }


    public function store(Request $request)
    {
        // return $request->file('img')->store('img-blog');
        $validateData = $request->validate([
            'judul' => ['required', 'max:255'],
            'slug' => ['required', 'unique:blogs'],
            'category_id' => ['required'],
            'img' => ['image', 'file', 'max:1024'],
            'isi' => ['required']
        ]);
        // Simpan tag ke database
       
        if ($request->file('img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['img'] = $request->file('img')->store('blog-img');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['more'] = Str::limit(strip_tags($request->isi), 125);
        Blog::create($validateData);
        return redirect('dashboard/blog')->with('ok', 'data berhasil di tambah');
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        return view('dashboard/blog/edit', [
            'blog' => Blog::find($blog->id),
            'category' => Category::all()

        ]);
    }


    public function update(Request $request, Blog $blog)
    {
        $rows = [
            'judul' => ['required', 'max:255'],
            'slug' => ['required', 'unique:blogs'],
            'category_id' => ['required'],
            'img' => ['image', 'file', 'max:1024'],
            'isi' => ['required']
        ];

        if ($request->id != $blog->id) {
            $rows['slug'] =  ['required', 'unique:blogs'];
        }

        $validateData = $request->validate($rows);
        if ($request->file('img')) {
            $validateData['img'] = $request->file('img')->store('blog-img');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['more'] = Str::limit(strip_tags($request->isi), 50);
        Blog::where('id', $blog->id)->update($validateData);
        return redirect('dashboard/blog')->with('update', 'data berhasil di hapus');
    }


    public function destroy(Blog $blog)
    {
        if ($blog->img) {
            Storage::delete($blog->img);
        }
        Blog::destroy($blog->id);
        return redirect('dashboard/blog')->with('del', 'data berhasil di hapus');
    }

    public function chekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blog::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
