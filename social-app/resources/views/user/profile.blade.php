@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div>
        @include('layouts.sidebar')
    </div>
    <div class="w-4/5 h-screen">

        <div class="p-16">
            <div class="p-8 bg-white mt-24">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div>
                            <p class="font-bold text-gray-700 text-xl">22</p>
                            <p class="text-gray-400">Followers</p>
                        </div>
                    </div>
                    <div class="relative">
                        {{-- profile --}}
                        <div
                            class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                            <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="Profile Image"
                                class="rounded-full">
                        </div>
                    </div>
                    <div class="space-x-8 flex justify-end mt-32 md:mt-0 md:justify-center"><button
                            class="btn btn-ghost btn-outline uppercase">
                            Connect</button>
                    </div>
                </div>
                <div class="mt-20 text-center pb-12">
                    <h1 class="text-4xl font-medium text-gray-700">{{ auth()->user()->username }} <span
                            class="font-light text-gray-500">{{ auth()->user()->age }}</span></h1>
                    <p class="font-light text-gray-600 mt-3">{{ auth()->user()->address }}</p>
                    {{-- <p class="mt-8 text-gray-500">work</p>
                    <p class="mt-2 text-gray-500">study</p> --}}
                </div>
                <div class="mt-12 flex flex-col justify-center">
                    <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the
                        {{ auth()->user()->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
