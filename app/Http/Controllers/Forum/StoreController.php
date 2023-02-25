<?php

namespace App\Http\Controllers\Forum;

use App\Models\Diskus;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    
    public function index()
    {
       return view('dashboard/forums/forum/index',[
        'diskus' => Diskus::all()
       ]);
    }
 
    public function create()
    {
        return view('dashboard/forums/forum/index',[
            'diskus' => Diskus::all()
           ]);
    }

    
    public function store(Request $request)
    {
        $request->user()->diskus()->create($request->validate([
            'isi' => ['required']
       ]));
      
        return redirect()->back()->with('ok', 'Send Massages Sucess');
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

    
    public function destroy(Diskus $diskus, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('ok', 'delete');
    }
}
