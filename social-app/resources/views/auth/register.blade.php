@extends('layouts.app')

<div class="w-full max-h-screen flex justify-center items-center">
    <img src="{{ asset('assets/login2.svg') }}" alt="not found" class="w-1/2">
    <div class="grid grid-cols-1 w-1/2 h-screen py-32">
        <div class="flex flex-col gap-4 mb-5">
            <div class="text-6xl text-start">
                Join the world now...
            </div>
        </div>
        <form method="post" action="{{ route('register.action') }}" class="flex flex-col gap-6 w-1/2">
            <div class="flex flex-col">
                <label for="text" class="mb-3">Username</label>
                <input type="text" class="input input-bordered" name="username" id="username"
                    placeholder="John Doe">
            </div>
            <div class="flex flex-col">
                <label for="email" class="mb-3">Email</label>
                <input type="email" class="input input-bordered" name="email" id="email"
                    placeholder="example@gmail.com">
            </div>
            <div class="flex flex-col">
                <label for="password" class="mb-3">Password</label>
                <input type="password" class="input input-bordered" name="password" id="password"
                    placeholder="12345678">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="text-slate-600 text-md">Have an account ? <a href="{{ route('login.view') }}"
                    class="text-blue-500 hover:underline">Login</a></div>
        </form>
    </div>
</div>
