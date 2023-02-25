<?php

namespace App\Http\Controllers\Forum;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Diskus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DellController extends Controller
{
    public function hapus(Diskus $diskus, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('ok', 'delete');
    }


}
