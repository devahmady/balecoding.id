<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardCategoryContoller extends Controller
{
   
    public function index()
    {
        return view('dashboard/category/index',[
            'category' => Category::paginate(10),
        ]);
    }

   
    public function create()
    {
        return view('dashboard/category/create', [
            'category' => Category::all()
        ]);
    }

  
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('dashboard/category')->with('ok', 'data berhasil di tambah');

    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('dashboard/category')->with('del', 'data berhasil di hapus');
    }
}
