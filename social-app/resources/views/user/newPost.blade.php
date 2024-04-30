@extends('layouts.app')

<div>
    <div>
        @include('layouts.sidebar')
    </div>
    <div class="w-full h-screen flex justify-center mt-32">
        <form action="{{ route('post.new.action') }}" method="post" class="w-full">
            <div class="flex flex-col gap-5 w-2/4 mx-auto">
                <div class="flex items-center justify-start gap-10  w-fullmx-auto">
                    <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found"
                        class="w-[100px] rounded-full">
                    <div class="flex flex-col gap-2">
                        <div>
                            {{ auth()->user()->username }}
                        </div>
                        <div class="text-sm font-light">
                            {{ date('Y-m-d H:i:s') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <textarea name="content" class="w-full h-[200px] textarea textarea-bordered p-5" placeholder="what are you thinking ?"></textarea>
                </div>
                <div class="flex justify-between items-center">
                    <input type="file" name="post_img" class="file-input file-input-bordered">
                    <button type="submit" class="btn btn-ghost btn-outline">CREATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
