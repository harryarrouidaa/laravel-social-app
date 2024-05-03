@extends('layouts.app')

<div class="w-full h-screen flex justify-center items-center">
    <div class="flex flex-col w-1/1 gap-10">
        <img src="{{ asset('assets/profile.svg') }}" alt="not found" class="w-[300px] mx-auto">
        <form action="{{ route('profile.upload.action') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile" class="file-input file-input-bordered w-full max-w-xs mx-auto" />
            <button type="submit" class="text-center text-slate-600">Upload</button>
        </form>
        <form method="post" action="{{route('profile.upload.skip')}}"  class="flex justify-center gap-1 items-center transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            @csrf
            <button type="submit" class="text-center text-slate-600">Skip</button>
            <img src="{{ asset('update/next-slate.svg') }}" alt="not found" class="w-[20px]">
        </form>
    </div>
</div>
</div>
