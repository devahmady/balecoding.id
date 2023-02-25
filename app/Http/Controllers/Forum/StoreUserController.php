<?php

namespace App\Http\Controllers\Forum;

use App\Models\User;
use App\Models\Diskus;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\DiskusCommented;

class StoreUserController extends Controller
{
    
    public function index(Diskus $diskus, User $user)
    {
        // return $diskus;
        return view('dashboard/forums/user/index', [
            'diskus' => Diskus::where('id','=',$diskus->id)->first(),
            'user' => User::all(),
            'comment' => $diskus->comment,

        ]);
    }

    
    public function create()
    {
        return view('dashboard/forums/user/index', [
            'diskus' => Diskus::latest('id')->first(),
            'user' => User::all()
        ]);
    }

    
    public function store(Request $request)
    {
        // return $request;
        $data = $request->validate([
            'isi' => ['required']
        ]);
        $data['user_id'] = $request->user()->id;
        $diskus = Diskus::where('id','=',$request->id)->first();
        // return $data;
        $comment = $diskus->comment()->create($data);
        // return $comment;
        $diskus->user->notify(new DiskusCommented($comment));
        
        return redirect()->back()->with('ok', 'Send Massages Sucess');
    }

    
    public function show(Diskus $diskus, User $user, Comment $comment, $id)
    {
        return view('dashboard/forums/user/index', [
            'diskus' => Diskus::latest('id')->first(),
            'user' => User::all(),
            'comment' => Comment::all()

        ]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
       
    }

    public function deleteComment(Request $request){
        // return "ini mau ngapus ".$request->id;    
        $d= auth()->user()->unreadNotifications;
        // return $d[0]->data['comment_id'];
        foreach($d as $dd){
            if($dd->data['comment_id'] == $request->id){
                $dd->delete();
            }
        }
        $data = Comment::findOrFail($request->id);
        // $data->user->id->notifications()->delete();
        $this->authorize('delete', $data);
        $data->delete();
        return redirect()->back();

        
    }
}
