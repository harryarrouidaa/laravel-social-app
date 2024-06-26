@extends('layouts.app')

<div class="w-full h-screen flex justify-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="h-screen w-5/6">
        @foreach ($posts as $post)
            @if ($post->image->path != '')
                <div class="flex justify-start w-full">
                    <div class="p-20 flex flex-col gap-8 w-1/2">
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
                            <img src="{{ Storage::url($post->image->path) }}" alt="not found"
                                class="w-[300px] rounded-md">
                            <div class="flex justify-start items-center gap-10 w-1/3">
                                @if ($post->likes()->where('post_id', $post->id)->where('user_id', auth()->user()->id)->exists())
                                    <form class="flex items-center gap-1" method="post"
                                        action="{{ route('user.unlike', ['id' => $post->id]) }}">
                                        @csrf
                                        <img src="{{ asset('/post/unlike.svg') }}" alt="not found" class="w-[20px]">
                                        <button type="submit" class="text-md text-blue-400">liked</button>
                                    </form>
                                @else
                                    <form class="flex items-center gap-1" method="post"
                                        action="{{ route('user.like', ['id' => $post->id]) }}">
                                        @csrf
                                        <img src="{{ asset('/post/like.svg') }}" alt="not found" class="w-[20px]">
                                        <button type="submit" class="text-md text-slate-600">like</button>
                                    </form>
                                @endif
                                <div class="flex items-center gap-1 mb-4">
                                    <img src="{{ asset('/post/comment.svg') }}" alt="not found" class="w-[18px]">
                                    <a href="{{ route('post.comments.view', ['id' => $post->id]) }}"
                                        class="text-md text-slate-600">comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <hr class="divider divider-horizontal py-20"> --}}
                </div>
                <hr class="">
            @endif
        @endforeach
        <div class="mx-auto text-center p-10">
            {{ $posts->links() }}
        </div>
    </div>
</div>
