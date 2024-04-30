@extends('layouts.app')

<div class="h-screen w-1/5 border-r-2 fixed top-0 left-0">
    <div class="w-full flex flex-col mt-32 pl-10 gap-10">
        <div class="flex items-center justify-start gap-5">
            <img src="{{ asset('/assets/sidebar/profile.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600 font-light  hover:underline" href="{{route('user.profile.view')}}">Profile</a>
        </div>
        <div class="flex items-center justify-start gap-5">
            <img src="{{ asset('/assets/sidebar/browse.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600 font-light hover:underline" href="{{ route('posts.view') }}">Browse</a>
        </div>
        <div class="flex items-center justify-start gap-5">
            <img src="{{ asset('/assets/sidebar/new.svg') }}" alt="not found" class="w-[30px]">
            <a class="text-2xl text-slate-600 font-light hover:underline" href="{{route('posts.new.view')}}">New</a>
        </div>
        <div class="flex items-center justify-start">
            <form action="{{ route('logout.action') }}" method="post" class="flex items-center  gap-5">
                @csrf
                <img src="{{ asset('/assets/sidebar/logout.svg') }}" alt="not found" class="w-[30px]">
                <button type="submit" class="text-2xl text-slate-600 hover:underline font-light">Logout</button>
            </form>
        </div>
    </div>
</div>