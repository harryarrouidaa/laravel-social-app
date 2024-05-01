@extends('layouts.app')

<div class="w-full h-screen flex justify-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="h-screen w-5/6">
        @foreach ($posts as $post)
            {{-- post {{$post}}
        
        user {{$post->user}}
        <hr> --}}
            @if ($post->image->path != '')
                <div class="p-20 flex flex-col gap-8">
                    <div class="flex justify-start items-center w-full gap-6">
                        <img src="{{ Storage::url($post->user->profile->path) }}" alt="not found"
                            class="rounded-full w-[60px] h-[60px]">
                        <div class="flex flex-col">
                            <a class="text-slate-600 text-md font-bold"
                                href="{{ route('user.show.view', ['id' => $post->user->id]) }}">
                                {{ $post->user->username }}
                            </a>
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
            @endif
        @endforeach
        <div class="mx-auto text-center p-10">
            {{ $posts->links() }}
        </div>
    </div>
</div>
