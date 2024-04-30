@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen p-10 mt-20">
        <form method="post" action="{{ route('user.edit.action') }}" class="grid grid-cols-2 gap-6 w-1/2">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="text" class="mb-3">Username</label>
                    <input type="text" class="input input-bordered" name="username" id="username"
                        placeholder="John Doe" value="{{auth()->user()->username}}">
                </div>
                <div class="flex flex-col">
                    <label for="email" class="mb-3">Email</label>
                    <input type="email" class="input input-bordered" name="email" id="email"
                        placeholder="example@gmail.com" value="{{auth()->user()->email}}">
                </div>
                <div class="flex flex-col">
                    <label for="password" class="mb-3">Password</label>
                    <input type="password" class="input input-bordered" name="password" id="password"
                        placeholder="12345678" value="{{auth()->user()->password}}">
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="age" class="mb-3">Age</label>
                    <input type="text" class="input input-bordered" name="age" id="age" placeholder="20" value="{{auth()->user()->age}}">
                </div>
                <div class="flex flex-col">
                    <label for="addresss" class="mb-3">Address</label>
                    <input type="text" class="input input-bordered" name="address" id="address"
                        placeholder="USA, new york" value="{{auth()->user()->address}}">
                </div>
                <div class="flex flex-col">
                    <label for="status" class="mb-3">status</label>
                    <input type="text" class="input input-bordered" name="status" id="status"
                        placeholder="men dream never ends" value="{{auth()->user()->status}}">
                </div>
            </div>
            <div class="flex flex-col col-span-2 gap-5">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
