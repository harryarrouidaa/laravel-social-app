<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profileUploadView()
    {
        return view('auth.profile_upload');
    }

    public function upload(Request $request)
    {
        $request->validate(['profile' => ['image']]);
        $user = auth()->user();

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile')->store('public/profiles');
            $result = Profile::create(['path' => $profile, 'user_id' => $user->id]);
            if ($result) {
                return redirect()->route('posts.view');
            }
        }
    }

    public function profileView(){
        $user = auth()->user();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('user.profile', compact(['user', 'profile']));
    }
}
