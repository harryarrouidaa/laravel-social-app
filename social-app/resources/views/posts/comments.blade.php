@extends('layouts.app')

<div class="w-full h-screen flex justify-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="h-screen w-5/6">
        <div class="flex flex-col w-full">
            <div class="w-full">
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

                        </div>
                    </div>
                </div>
                <hr class="">
            </div>
            <div class="w-full flex flex-col">
                @foreach ($comments as $comment)
                    <div class="w-full test-start p-10 flex justify-start items-center gap-5">
                        <img src="{{ Storage::url($comment->user->profile->path) }}" alt="not found"
                            class="w-[60px] h-[60px] rounded-full"></img>
                        <div class="flex justify-center items-center">
                            <div class="flex flex-col gap-2 border-r-2 w-[200px]">
                                <div class="font-bold text-slate-600 text-md">{{ $comment->user->username }}</div>
                                <div class="font-normal text-slate-600 text-sm">{{ $comment->created_at }}</div>
                            </div>
                        </div>
                        <div class="text-start text-slate-600 pl-10 w-full">{{ $comment->content }}</div>
                        @if ($comment->user_id === auth()->user()->id)
                            <form method="post" action="{{route('user.comment.delete', ['id' => $comment->id])}}" class="flex justify-end text-end text-end mt-3">
                                @csrf 
                                @method('DELETE')
                                <button class="flex justify-center gap-1" type="submit">
                                    <img src="{{ asset('/post/delete-1.svg') }}" alt="not found" class="w-[20px]">
                                    <span class="text-sm text-red-400">delete</span>
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
                <form action="{{ route('post.comment.action', ['post_id' => $post_id]) }}" method="post"
                    class="w-full flex justify-center gap-5 my-20">
                    @csrf
                    <textarea name="content" class="textarea textarea-bordered w-[70%] p-5"
                        placeholder="what are you thinking about this post..."></textarea>
                    <button type="submit" class="text-slate-600 font-bold relative">comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
