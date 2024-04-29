@extends('layouts.app')

<div class="w-full h-screen flex justify-center items-center">
    <div class="flex flex-col w-1/1 gap-10">
        <img src="{{ asset('assets/profile.svg') }}" alt="not found" class="w-[300px] mx-auto">
        <form action="{{ route('profile.upload.action') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile" class="file-input file-input-bordered w-full max-w-xs mx-auto" />
            <button type="submit" class="btn btn-outline btn-primary">Upload</button>
        </form> 
        <div class="flex items-end justify-center gap-3">
            <a class="text-center text-4xl text-slate-600" href="{{ route('posts.view') }}">Skip</a>
            <img src="{{ asset('assets/next.svg') }}" alt="not found" class="w-[20px]">
        </div>
    </div>
</div>
</div>
