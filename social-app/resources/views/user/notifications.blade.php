@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen flex flex-col text-slate-600">
        @foreach ($notifications as $notification)
            <div
                class="w-full flex justify-start gap-5 items-center {{ $notification->read == true ? '' : 'bg-slate-50' }} p-10">
                <img src="{{ Storage::url($notification->sender->profile->path) }}" alt="not found"
                    class="w-[60px] h-[60px] rounded-full">
                <div class="flex flex-col w-[85%] border-r-2">
                    <div class="font-bold text-slate-600">{{ $notification->sender->username }}</div>
                    <div class="text-slate-600">{{ $notification->content }}</div>
                </div>
                <form class="flex justify-center items-center gap-1" method="post"
                    action="{{ route('notification.check', ['id' => $notification->id]) }}">
                    @csrf
                    @if ($notification->read == true)
                        <img src="{{ asset('assets/checkblue.svg') }}" alt="not found" class="w-[25px]">
                        <button type="submit" class="text-start text-sm text-blue-400">
                            checked
                        </button>
                    @else
                        <img src="{{ asset('assets/check.svg') }}" alt="not found" class="w-[25px]">
                        <button type="submit" class="text-start text-sm">
                            check
                        </button>
                    @endif
                </form>
            </div>
            <hr>
        @endforeach
    </div>
</div>
