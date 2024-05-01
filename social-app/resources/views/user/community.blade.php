@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen flex flex-col">
        <div class="">
            <div class="relative w-3/5 mx-auto my-20">
                <input type="text" id="Search" placeholder="Search for..."
                    class="w-full rounded-lg bg-slate-50 border-2 py-2.5 pe-10 shadow-sm p-10" />

                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
            </div>
            <div class="flex justify-center items-center gap-3">
                <img src="{{ asset('assets/attention.svg') }}" alt="not found" class="w-[20px]">
                <div class="text-indigo-400 underline">
                    every user is with his latest post, so you can chose wisely
                </div>
            </div>
            <div class="w-full flex flex-col p-10 gap-10">
                @foreach ($users as $user)
                    <div class="p-20 flex flex-col gap-8">
                        <div class="w-full flex justify-between items-center">
                            <div class="flex justify-start items-center w-full gap-6">
                                <img src="{{ Storage::url($user->profile->path) }}" alt="not found"
                                    class="rounded-full w-[60px] h-[60px]">
                                <div class="flex flex-col">
                                    <div class="text-slate-600 text-md font-bold">
                                        {{ $user->username }} - {{ $user->age }}
                                    </div>
                                    <div class="text-slate-600 text-md">
                                        {{ $user->address }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-10 items-center">

                                {{-- Check if the authenticated user is following this user --}}
                                @if (auth()->user()->following()->where('following_id', $user->id)->exists())
                                    <div class="flex justify-center gap-2 items-center mb-3">
                                        <img src="{{ asset('assets/added.svg') }}" alt="not found" class="w-[25px]">
                                        <button type="submit" class="text-lg text-emerald-400">Followed</button>
                                    </div>
                                @else
                                    <form method="post" action="/user/follow/{{ $user->id }}"
                                        class="flex justify-center gap-2 items-center">
                                        @csrf
                                        <img src="{{ asset('assets/add.svg') }}" alt="not found" class="w-[25px]">
                                        <button type="submit" class="text-lg text-slate-600">Follow</button>
                                    </form>
                                    <form method="post" action="/user/block/{{ $user->id }}"
                                        class="flex justify-center gap-2 items-center">
                                        @csrf
                                        <img src="{{ asset('assets/block.svg') }}" alt="not found" class="w-[25px]">
                                        <button type="submit" class="text-lg text-red-400">Block</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                        @if (count($user->posts) > 0)
                            <div class="flex flex-col w-full gap-5">
                                <div class="text-slate-600 text-lg text-start">
                                    {{ $user->posts->first()->content }}
                                </div>
                                <img src="{{ Storage::url($user->posts->first()->image->path) }}" alt="not found"
                                    class="w-[300px] rounded-md">
                            </div>
                        @else
                            <div class="flex flex-col w-full gap-5">
                                <div class="flex justify-start items-center gap-3">
                                    <div class="text-slate-400 underline">
                                        !! this user does not have posted yet
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
