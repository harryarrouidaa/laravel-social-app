<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $req, $id)
    {
        $req->validate(['profile', ['image']]);
        $user = User::find($id);
        if ($req->hasFile('profile')) {
            $deleted = Storage::delete($user->profile->path);
            if ($deleted) {
                $newProfile = $req->file('profile')->store('public/profiles');
                $user->profile->path = $newProfile;
                if ($user->profile->save()) {
                    return redirect()->route('user.profile.view');
                }
            }
        }
        return back();
    }
    // to be fixed later
    public function skip(Request $req)
    {
        $user = auth()->user();
        $result = Profile::create(['user_id' => $user->id]);
        if ($result) {
            return redirect()->route('user.profile.view');
        }
    }
}
