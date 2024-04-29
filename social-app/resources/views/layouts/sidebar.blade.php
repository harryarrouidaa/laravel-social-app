@extends('layouts.app')

<div class="h-screen w-1/5 border-r-2 fixed top-0 left-0">
    <div class="w-full flex flex-col mt-32 pl-10 gap-10">
        <div class="flex items-center justify-start gap-5 hover:underline">
            <img src="{{ asset('/assets/sidebar/profile.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600" href="">Profile</a>
        </div>
        <div class="flex items-center justify-start gap-5 hover:underline">
            <img src="{{ asset('/assets/sidebar/browse.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600" href="{{ route('posts.view') }}">Browse</a>
        </div>
        <div class="flex items-center justify-start gap-5 hover:underline">
            <img src="{{ asset('/assets/sidebar/new.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600" href="">New</a>
        </div>
        <div class="flex items-center justify-start gap-5">
            <img src="{{ asset('/assets/sidebar/logout.svg') }}" alt="not found" class="w-[30px]">
            <form action="{{ route('logout.action') }}" method="post" class="flex items-center">
                @csrf
                <button type="submit" class="text-2xl text-slate-600 hover:underline">Logout</button>
            </form>
        </div>
    </div>
</div>