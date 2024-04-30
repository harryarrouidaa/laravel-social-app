@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen">
        <div class="border-b w-full p-10 flex justify-between">
            <div class="w-full flex justify-start items-center gap-6">
                <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found"
                    class="w-[100px] h-[100px] rounded-full">
                <div class="flex flex-col gap-2">
                    <div class="font-bold">{{ auth()->user()->username }}</div>
                    <div>{{ auth()->user()->email }}</div>
                    <div class="text-md font-light">{{ auth()->user()->status }}</div>
                </div>
            </div>
            <div class="">
                <a href="{{ route('user.edit.view') }}">
                    <img src="{{ asset('/profile/edit.svg') }}" alt="not found" class="w-[25px]">
                </a>
            </div>
        </div>
        <div class="">
            @foreach ($posts as $post)
                <div class="p-20 flex flex-col gap-8">
                    <div class="flex justify-start items-center w-full gap-6">
                        <img src="{{ Storage::url($post->user->profile->path) }}" alt="not found"
                            class="rounded-full w-[60px] h-[60px]">
                        <div class="flex flex-col">
                            <div class="text-slate-600 text-md font-bold">
                                {{ $post->user->username }}
                            </div>
                            <div class="text-slate-600 text-md">
                                {{ $post->created_at }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-5">
                        <div class="text-slate-600 text-lg text-start">
                            {{ $post->content }}
                        </div>
                        <img src="{{ Storage::url($post->image->path) }}" alt="not found" class="w-[300px] rounded-md">
                        <div class="flex justify-start items-center gap-10 w-1/3">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/post/like.svg') }}" alt="not found" class="w-[23px]">
                                <div class="text-lg text-slate-600">like</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/post/comment.svg') }}" alt="not found" class="w-[20px]">
                                <div class="text-lg text-slate-600">comment</div>
                            </div>
                            <form action="/posts/delete/{{ $post->id }}" method="post" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-lg text-red-400 flex justify-center items-center gap-2">
                                    <img src="{{ asset('/post/delete-1.svg') }}" alt="not found"
                                        class="w-[22px]">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
