@extends('layouts.app')
@php
    use App\Models\Friend;
@endphp

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
                    <div class="text-slate-600">
                        {{ $notification->content }}
                        @if ($notification->type !== 'request')
                            , <a href="{{ route('notification.show', ['id' => $notification->id]) }}"
                                class="text-blue-400 hover:underline">see more</a>
                        @endif
                    </div>
                </div>
                <form class="flex justify-center items-center gap-1" method="post"
                    action="{{ route('notification.check', ['id' => $notification->id]) }}">
                    @csrf
                    {{-- to be fixed later --}}
                    @if ($notification->read == true)
                        @if (
                            $notification->type === 'request' &&
                                auth()->user()->isFriend($notification->sender_id) &&
                                Friend::where('user_id', $notification->sender_id)->where('friend_id', auth()->user()->id)->first()->accepted == 1)
                            <img src="{{ asset('assets/checkblue.svg') }}" alt="not found" class="w-[25px]">
                            <div class="text-start text-sm text-blue-400">
                                Accepted
                            </div>
                        @elseif($notification->type !== 'request')
                            <img src="{{ asset('assets/checkblue.svg') }}" alt="not found" class="w-[25px]">
                            <div class="text-start text-sm text-blue-400">
                                Checked
                            </div>
                        @endif
                    @else
                        @if (
                            $notification->type == 'request' &&
                                auth()->user()->isFriend($notification->sender_id) == 0)
                            <img src="{{ asset('assets/check.svg') }}" alt="not found" class="w-[25px]">
                            <button type="submit" class="text-start text-sm text-slate-600">
                                Accept
                            </button>
                        @elseif($notification->type !== 'request')
                            <img src="{{ asset('assets/check.svg') }}" alt="not found" class="w-[25px]">
                            <button type="submit" class="text-start text-sm text-slate-600">
                                Check
                            </button>
                        @endif
                    @endif
                </form>
            </div>
            <hr>
        @endforeach
        <form
            class="fixed bottom-10 right-10 bg-slate-50 border rounded-md py-3 px-5 flex justify-center items-center gap-1"
            action="{{ route('notifications.delete') }}" method="post">
            @csrf
            @method('DELETE')
            <img src="{{ asset('assets/junk.svg') }}" alt="not found" class="w-[25px]">
            <button type="submit" class="text-red-400">DELETE ALL</button>
        </form>
    </div>
</div>
