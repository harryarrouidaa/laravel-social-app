@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen flex flex-col p-10 text-slate-600">
        <div class="flex flex-col w-full mx-auto text-center gap-5 py-10">
            <img src="{{ Storage::url($user->profile->path) }}" alt="not found"
                class="w-[200px] h-[200px] rounded-full mx-auto mb-5">
            <div class="flex justify-center items-center gap-3">
                <div class="font-bold"> {{ $user->username }}</div>
                @if (auth()->user()->following()->where('following_id', $user->id)->exists())
                    <form method="post" action="/user/unfollow/{{ $user->id }}"
                        class="flex justify-center mt-3 items-center mb-3">
                        @method('DELETE')
                        @csrf
                        <img src="{{ asset('assets/added.svg') }}" alt="not found" class="w-[20px]">
                        <button type="submit" class="text-md text-emerald-400">Followed</button>
                    </form>
                @else
                    <form method="post" action="/user/follow/{{ $user->id }}"
                        class="flex justify-center items-center mt-3">
                        @csrf
                        <img src="{{ asset('assets/add.svg') }}" alt="not found" class="w-[20px]">
                        <button type="submit" class="text-md text-slate-600">Follow</button>
                    </form>
                @endif
            </div>
            <div class="flex justify-center items-center gap-3">
                <div class="font-light">{{ $user->status }}</div> -
                <div>{{ $user->age }} </div>
            </div>
            <div class="flex justify-center items-center gap-3">
                <div>{{ count($user->followers->unique()) }}
                    followers</div>
                <div>{{ count($user->following->unique()) }}
                    following</div>
            </div>
        </div>
        <hr>
        @if (count($posts) > 0)
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
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <div class="text-slate-400 p-10 w-full text-center">
                this account does not have any post yet
            </div>
        @endif
    </div>
</div>
