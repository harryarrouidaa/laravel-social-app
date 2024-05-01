<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $like = Like::create(['post_id' => $id, 'user_id' => auth()->user()->id]);
        if ($like) {
            return back();
        }
    }
    public function unlike(Request $request, $id)
    {
        $unlike = Like::where('user_id', '=', auth()->user()->id)
            ->where('post_id', '=', $id)->delete();
        if ($unlike) {
            return back();
        }
    }
}
