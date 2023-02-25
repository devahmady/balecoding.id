<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Blog;
use \App\Models\Komentar;
class BlogKomentarController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
     //VALIDASI DATA YANG DITERIMA
    $this->validate($request, [
        'username' => 'required',
        'comment' => 'required'
    ]);

    Komentar::create([
        'blog_id' => $request->id,
        //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
        'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
        'username' => $request->username,
        'comment' => $request->comment
    ]);
    return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);     
    }
}
