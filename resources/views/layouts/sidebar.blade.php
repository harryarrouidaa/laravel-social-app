@extends('layouts.app')

<div class="h-screen w-1/6 border-r-2 fixed top-0 left-0 bg-slate-50">
    {{-- not sure if it's gonna stay --}}
    {{-- <div class="flex items-center justify-start gap-2 fixed top-10 left-10">
        <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found" class="w-[50px] rounded-full">
        <a class="font-bold text-xl text-slate-600 hover:underline hover:text-blue-400"
            href="{{ route('user.profile.view') }}">
            {{ auth()->user()->username }}
        </a>
    </div> --}}
    {{-- ## --}}
    <div class="w-full flex flex-col mt-32 pl-10 gap-5 pt-32">
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/profile.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline"
                href="{{ route('user.profile.view') }}">Profile</a>
        </div>
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/notification.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline"
                href="{{ route('notifications.view') }}">Notification</a>
        </div>
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/community1.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline"
                href="{{ route('community.view') }}">Community</a>
        </div>
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/browse.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline" href="{{ route('posts.view') }}">Browse</a>
        </div>
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/new.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline" href="{{ route('posts.new.view') }}">New</a>
        </div>
        <div class="flex items-center justify-start gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            <img src="{{ asset('/assets/sidebar/chat.svg') }}" alt="not found" class="w-[25px]">
            <a class="text-xl text-slate-600 font-normal hover:underline"
                href="http://localhost:3000/{{ auth()->user()->id }}">chat</a>
        </div>
    </div>
    <div class="flex items-center justify-start absolute bottom-5 left-10">
        <form action="{{ route('logout.action') }}" method="post"
            class="flex items-center gap-2 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
            @csrf
            <img src="{{ asset('/assets/sidebar/logout.svg') }}" alt="not found" class="w-[25px]">
            <button type="submit" class="text-xl text-slate-600 hover:underline font-normal">Logout</button>
        </form>
    </div>
</div>
