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
                return redirect()->route('user.profile.view');
            }
        }
    }

    public function profileView()
    {
        $posts = auth()->user()->posts;
        return view('user.profile', compact('posts'));
    }

    public function editView()
    {
        return view('user.edit');
    }
    public function edit(Request $req)
    {
        $user = auth()->user();
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->age = $req->age;
        $user->address = $req->address;
        $user->status = $req->status;
        $result = $user->save();
        if ($result) {
            return redirect()->route('user.profile.view');
        }
    }
}
