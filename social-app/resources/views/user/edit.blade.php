@extends('layouts.app')


<div class="w-full h-screen flex justify-between items-center">
    <div class="w-1/6">
        @include('layouts.sidebar')
    </div>
    <div class="w-5/6 h-screen text-slate-600">
        <div class="border-b w-full p-10 flex justify-between">
            <div class="w-full flex justify-start items-center gap-6">
                <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found"
                    class="w-[100px] h-[100px] rounded-full">
                <div class="flex flex-col gap-1">
                    <div class="font-bold">{{ auth()->user()->username }}</div>
                    <div>{{ auth()->user()->email }}</div>
                    {{-- <div class="text-md font-light">{{ count(auth()->user()->following->pluck('user_id')->where('user_id', '!=', auth()->user()->id)->unique()) }} followers -</div> --}}
                    <div class="flex justify-start gap-5 items-center">
                        <div class="text-md font-light">{{ count(auth()->user()->followers) }} followers</div>
                        <div class="text-md font-light">{{ count(auth()->user()->following) }} following</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex w-5-6">
            <form method="post" action="{{ route('user.edit.action') }}" class="grid grid-cols-2 gap-6 w-1/2 p-10">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="text" class="mb-3 font-bold">Username</label>
                        <input type="text"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="username" id="username" placeholder="John Doe"
                            value="{{ auth()->user()->username }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="mb-3 font-bold">Email</label>
                        <input type="email"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="email" id="email" placeholder="example@gmail.com"
                            value="{{ auth()->user()->email }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="mb-3 font-bold">Password</label>
                        <input type="password"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="password" id="password" placeholder="12345678"
                            value="{{ auth()->user()->password }}">
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col">
                        <label for="age" class="mb-3 font-bold">Age</label>
                        <input type="text"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="age" id="age" placeholder="20" value="{{ auth()->user()->age }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="addresss" class="mb-3 font-bold">Address</label>
                        <input type="text"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="address" id="address" placeholder="USA, new york"
                            value="{{ auth()->user()->address }}">
                    </div>
                    <div class="flex flex-col">
                        <label for="status" class="mb-3 font-bold">status</label>
                        <input type="text"
                            class="input input-bordered focus:border-blue-400 focus:outline-none focus:bg-blue-50"
                            name="status" id="status" placeholder="men dream never ends"
                            value="{{ auth()->user()->status }}">
                    </div>
                </div>
                <hr class="col-span-2">
                <div
                    class="flex justify-start items-center gap-1 transition-all duration-300 ease-in-out delay-50 hover:ml-3">
                    <button type="submit" class="">Update</button>
                    <img src="{{ asset('update/next-slate.svg') }}" alt="not found" class="w-[20px]">
                </div>
            </form>
            <div class="divider divider-horizontal">OR</div>
            <div class="p-10 flex flex-col text-center mx-auto w-1/3">
                <svg class="animated" id="freepik_stories-profile-interface" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.com/svgjs">
                    <style>
                        svg#freepik_stories-profile-interface:not(.animated) .animable {
                            opacity: 0;
                        }

                        svg#freepik_stories-profile-interface.animated #freepik--Floor--inject-73 {
                            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) lightSpeedRight;
                            animation-delay: 0s;
                        }

                        svg#freepik_stories-profile-interface.animated #freepik--Plant--inject-73 {
                            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) zoomOut;
                            animation-delay: 0s;
                        }

                        svg#freepik_stories-profile-interface.animated #freepik--Device--inject-73 {
                            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideRight;
                            animation-delay: 0s;
                        }

                        svg#freepik_stories-profile-interface.animated #freepik--Screen--inject-73 {
                            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown;
                            animation-delay: 0s;
                        }

                        svg#freepik_stories-profile-interface.animated #freepik--Character--inject-73 {
                            animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideUp, 1.5s Infinite linear floating;
                            animation-delay: 0s, 1s;
                        }

                        @keyframes lightSpeedRight {
                            from {
                                transform: translate3d(50%, 0, 0) skewX(-20deg);
                                opacity: 0;
                            }

                            60% {
                                transform: skewX(10deg);
                                opacity: 1;
                            }

                            80% {
                                transform: skewX(-2deg);
                            }

                            to {
                                opacity: 1;
                                transform: translate3d(0, 0, 0);
                            }
                        }

                        @keyframes zoomOut {
                            0% {
                                opacity: 0;
                                transform: scale(1.5);
                            }

                            100% {
                                opacity: 1;
                                transform: scale(1);
                            }
                        }

                        @keyframes slideRight {
                            0% {
                                opacity: 0;
                                transform: translateX(30px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateX(0);
                            }
                        }

                        @keyframes slideDown {
                            0% {
                                opacity: 0;
                                transform: translateY(-30px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        @keyframes slideUp {
                            0% {
                                opacity: 0;
                                transform: translateY(30px);
                            }

                            100% {
                                opacity: 1;
                                transform: inherit;
                            }
                        }

                        @keyframes floating {
                            0% {
                                opacity: 1;
                                transform: translateY(0px);
                            }

                            50% {
                                transform: translateY(-10px);
                            }

                            100% {
                                opacity: 1;
                                transform: translateY(0px);
                            }
                        }
                    </style>
                    <g id="freepik--Floor--inject-73" class="animable" style="transform-origin: 250px 350.75px;">
                        <ellipse cx="250" cy="350.75" rx="224.57" ry="129.66"
                            style="fill: rgb(245, 245, 245); transform-origin: 250px 350.75px;" id="elmnu0hml215"
                            class="animable"></ellipse>
                    </g>
                    <g id="freepik--Plant--inject-73" class="animable animator-active"
                        style="transform-origin: 83.9289px 311.514px;">
                        <path
                            d="M98.66,330.05l-9.15,5.32s4.62-14.74,2.06-29.56A28.4,28.4,0,0,0,87.85,296c-.72-1.5-6.23-10.74-1.38-15s16.25,4.21,15.73,27A88.7,88.7,0,0,1,98.66,330.05Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 93.3552px 307.654px;" id="el87jd9mm1rah"
                            class="animable"></path>
                        <g id="elutys4aa8eek">
                            <path
                                d="M98.66,330.05l-9.15,5.32s4.62-14.74,2.06-29.56A28.4,28.4,0,0,0,87.85,296c-.72-1.5-6.23-10.74-1.38-15s16.25,4.21,15.73,27A88.7,88.7,0,0,1,98.66,330.05Z"
                                style="opacity: 0.3; transform-origin: 93.3552px 307.654px;" class="animable">
                            </path>
                        </g>
                        <path
                            d="M94.41,333l-.15,0a.42.42,0,0,1-.25-.54c0-.1,3.44-9.57,3.26-24.81s-8.08-23.17-8.16-23.25a.43.43,0,0,1,0-.6.42.42,0,0,1,.6,0c.08.08,8.23,8.34,8.41,23.84s-3.28,25-3.31,25.11A.44.44,0,0,1,94.41,333Z"
                            style="fill: rgb(255, 255, 255); transform-origin: 93.5574px 308.337px;"
                            id="elafr7zjb9b4t" class="animable"></path>
                        <path
                            d="M91.57,334.2l-15.11,8.89s-6.92-1-6.4-7.53,3.34-8.05-.16-10.91-4.41-3-4.24-5.86,2-4,2.94-5.14,3.36-3.44,1.62-6.82-4.1-6.65-.59-8.2c2.09-.93,5.6.23,7.94,2.71s4.25,4.25,6.46,4.82,6.81.63,6.66,4.43-1.15,5.12-.22,6.81C92.21,320.58,99.63,322.3,91.57,334.2Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 80.4475px 320.7px;" id="ely2yykqh7u1"
                            class="animable"></path>
                        <path
                            d="M85.41,338.25h0a.42.42,0,0,1-.39-.45c0-.22,1.63-22.36-13.73-36.88a.41.41,0,0,1,0-.59.43.43,0,0,1,.6,0c15.66,14.8,14,37.33,14,37.56A.43.43,0,0,1,85.41,338.25Z"
                            style="fill: rgb(255, 255, 255); transform-origin: 78.5528px 319.231px;" id="el84svwcytwq"
                            class="animable"></path>
                        <path
                            d="M82.71,318.94h0a.43.43,0,0,1-.39-.46,13.46,13.46,0,0,1,4.94-9.6.43.43,0,0,1,.59.1.42.42,0,0,1-.09.59,12.76,12.76,0,0,0-4.59,9A.43.43,0,0,1,82.71,318.94Z"
                            style="fill: rgb(255, 255, 255); transform-origin: 85.1258px 313.873px;" id="ely8skuq8kzz"
                            class="animable"></path>
                        <path
                            d="M83.82,322.78a.39.39,0,0,1-.31-.14s-3.84-4.1-12.48-2.92a.41.41,0,0,1-.48-.36.43.43,0,0,1,.36-.48c9.11-1.25,13.06,3,13.23,3.2a.41.41,0,0,1,0,.59A.38.38,0,0,1,83.82,322.78Z"
                            style="fill: rgb(255, 255, 255); transform-origin: 77.4058px 320.717px;" id="elvimjcj6u2k"
                            class="animable"></path>
                    </g>
                    <g id="freepik--Shadows--inject-73" class="animable"
                        style="transform-origin: 269.363px 348.875px;">
                        <path
                            d="M436.11,372,285.2,284.91a17.73,17.73,0,0,0-17.71,0l-53.34,30.8a5.78,5.78,0,0,0,0,10l150.91,87.13a17.73,17.73,0,0,0,17.71,0l53.34-30.8A5.78,5.78,0,0,0,436.11,372Z"
                            style="fill: rgb(224, 224, 224); transform-origin: 325.147px 348.875px;"
                            id="el21rp94qding" class="animable"></path>
                        <ellipse cx="147.76" cy="384.29" rx="48.06" ry="27.75"
                            style="fill: rgb(224, 224, 224); transform-origin: 147.76px 384.29px;" id="el1e5h37zaten"
                            class="animable"></ellipse>
                    </g>
                    <g id="freepik--Device--inject-73" class="animable"
                        style="transform-origin: 316.09px 213.321px;">
                        <path
                            d="M369.92,403.58,248.2,333.31c-8.58-4.95-15.55-18.26-15.55-29.71V43c0-11.45,7-16.71,15.55-11.76L369.92,101.5c8.58,5,15.54,18.25,15.54,29.7V391.83C385.46,403.28,378.5,408.54,369.92,403.58Z"
                            style="fill: rgb(69, 90, 100); transform-origin: 309.055px 217.413px;" id="eljd7f1chage"
                            class="animable"></path>
                        <path
                            d="M383.93,93.33,262.22,23.06c-3.67-2.12-7.05-2.37-9.71-1.07h0a9,9,0,0,0-.95.55l-13.63,7.93c2.74-1.64,6.33-1.52,10.27.75L369.92,101.5c8.58,5,15.54,18.25,15.54,29.7V391.83c0,6.05-1.94,10.38-5,12.37l13.46-7.84h0c3.43-1.82,5.61-6.29,5.61-12.7V123C399.48,111.59,392.52,98.28,383.93,93.33Z"
                            style="fill: rgb(55, 71, 79); transform-origin: 318.73px 212.697px;" id="elwcgbsm02ci"
                            class="animable"></path>
                        <path
                            d="M385.46,131.2V391.83c0,6.05-1.94,10.38-5,12.37l13.46-7.84h0c3.43-1.82,5.61-6.29,5.61-12.7V123l-14,8.14Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 389.995px 263.6px;" id="ely880ap1b9zm"
                            class="animable"></path>
                        <polygon points="399.48 143.27 385.46 151.36 385.46 157.68 399.48 149.59 399.48 143.27"
                            style="fill: rgb(55, 71, 79); transform-origin: 392.47px 150.475px;" id="el8qufnhez2s9"
                            class="animable"></polygon>
                        <path
                            d="M393.34,185.32h0c-1.25.72-2.27,0-2.27-1.72V170a5.45,5.45,0,0,1,2.27-4.34h0c1.25-.72,2.27.05,2.27,1.72V181A5.46,5.46,0,0,1,393.34,185.32Z"
                            style="fill: rgb(55, 71, 79); transform-origin: 393.34px 175.494px;" id="elguz0dhr9w6"
                            class="animable"></path>
                        <path
                            d="M391.07,183.6V170a5.45,5.45,0,0,1,2.27-4.34,1.47,1.47,0,0,1,1.43-.13v0l-1.69-.88v0a1.43,1.43,0,0,0-1.48.11,5.45,5.45,0,0,0-2.27,4.34V182.7a2,2,0,0,0,.78,1.81h0l1.78.93h0A2,2,0,0,1,391.07,183.6Z"
                            style="fill: rgb(69, 90, 100); transform-origin: 392.044px 174.967px;" id="elv68kx93btp8"
                            class="animable"></path>
                        <path
                            d="M393.34,218.22h0c-1.25.72-2.27,0-2.27-1.72V202.91a5.46,5.46,0,0,1,2.27-4.34h0c1.25-.72,2.27.05,2.27,1.72v13.59A5.45,5.45,0,0,1,393.34,218.22Z"
                            style="fill: rgb(55, 71, 79); transform-origin: 393.34px 208.399px;" id="el4wv2fkeo7x"
                            class="animable"></path>
                        <path
                            d="M391.07,216.5V202.91a5.46,5.46,0,0,1,2.27-4.34,1.47,1.47,0,0,1,1.43-.13h0l-1.69-.88h0a1.48,1.48,0,0,0-1.48.11,5.46,5.46,0,0,0-2.27,4.34V215.6a2,2,0,0,0,.78,1.81v0l1.78.93v0A2,2,0,0,1,391.07,216.5Z"
                            style="fill: rgb(69, 90, 100); transform-origin: 392.044px 207.876px;" id="el3pbp9i4la0h"
                            class="animable"></path>
                        <path
                            d="M365.68,108.82,246.07,39.75a3.3,3.3,0,0,0-4.95,2.86v261c0,8.72,6.17,19.42,13.72,23.77l116.71,67.39a3.63,3.63,0,0,0,5.45-3.15V128.43C377,121.24,371.91,112.42,365.68,108.82Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 309.06px 217.284px;" id="el4h1lfmb0u32"
                            class="animable"></path>
                        <g id="elxmifmfhw0jr">
                            <path
                                d="M365.68,108.82,246.07,39.75a3.3,3.3,0,0,0-4.95,2.86v261c0,8.72,6.17,19.42,13.72,23.77l116.71,67.39a3.63,3.63,0,0,0,5.45-3.15V128.43C377,121.24,371.91,112.42,365.68,108.82Z"
                                style="fill: rgb(255, 255, 255); opacity: 0.5; transform-origin: 309.06px 217.284px;"
                                class="animable"></path>
                        </g>
                        <polygon points="281.83 57.78 283.69 65.59 323.33 88.45 330.18 84.8 281.83 57.78"
                            style="fill: rgb(69, 90, 100); transform-origin: 306.005px 73.115px;" id="elsgq6iod0laq"
                            class="animable"></polygon>
                        <path
                            d="M293.48,65.32c0,1.3-.9,1.82-2,1.18a4.47,4.47,0,0,1-2-3.52c0-1.29.9-1.82,2-1.17A4.48,4.48,0,0,1,293.48,65.32Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 291.48px 64.1527px;" id="elx9z9ofh58h8"
                            class="animable"></path>
                        <path
                            d="M320.2,81.83a1.25,1.25,0,0,1-.62-.16L299.33,70.36a1.27,1.27,0,1,1,1.24-2.22l20.25,11.32a1.26,1.26,0,0,1-.62,2.37Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 310.081px 74.9044px;" id="elt30qfv8vdl"
                            class="animable"></path>
                    </g>
                    <g id="freepik--Screen--inject-73" class="animable"
                        style="transform-origin: 268.253px 245.768px;">
                        <path
                            d="M349,147.91V421.69c0,5-1.83,8.33-4.63,9.42l-.07,0h0l-11.87,6.51.06-10.57,1.32-283.93,12.54-6.42A27.07,27.07,0,0,1,349,147.91Z"
                            style="fill: rgb(224, 224, 224); transform-origin: 340.715px 287.16px;" id="elq7h6trfzrih"
                            class="animable"></path>
                        <path
                            d="M331.81,438.68l.08-11.6,1.32-284.3,13.43-6.86.26.56a27.71,27.71,0,0,1,2.72,11.43V421.69c0,5-1.87,8.75-5,10h0Zm2.6-295.15L333.1,427.09l-.06,9.54,11.09-6.07c2.7-1.05,4.28-4.36,4.28-8.87V147.91a26.26,26.26,0,0,0-2.35-10.34Z"
                            style="fill: rgb(224, 224, 224); transform-origin: 340.715px 287.3px;" id="elgcnw9ma52ra"
                            class="animable"></path>
                        <path
                            d="M346.35,136.74l-12.54,6.42L199.57,65.06l-9-5.21,12.39-7,.35-.21h0c2-1.19,4.56-1.11,7.41.54l127.06,73.36C341.24,128.52,344.3,132.32,346.35,136.74Z"
                            style="fill: rgb(224, 224, 224); transform-origin: 268.46px 97.4961px;" id="elgnxxp3wk5at"
                            class="animable"></path>
                        <path
                            d="M333.79,143.84l-.28-.16L189.39,59.84,203,52.13c2.24-1.35,5.09-1.16,8,.53L338.12,126c3.4,2,6.6,5.77,8.78,10.46l.25.52Zm-142-84,142,82.61,11.72-6c-2.06-4.23-5-7.63-8-9.4L210.46,53.71c-2.45-1.41-4.78-1.64-6.6-.66l-.55.34Z"
                            style="fill: rgb(224, 224, 224); transform-origin: 268.27px 97.5395px;" id="elbwbjcszev9j"
                            class="animable"></path>
                        <path
                            d="M336.71,154.82V428.41c0,4.31-1.37,7.41-3.57,8.86l-.71.39c-1.91.9-4.3.7-6.9-.8L264.11,401.4l-28.7-16.57L198.46,363.5c-6.18-3.57-11.19-13.15-11.19-21.38V68.55c0-4.17,1.28-7.19,3.34-8.7a4.91,4.91,0,0,1,1.14-.64c1.87-.8,4.19-.56,6.71.89l127.07,73.36c3.29,1.89,6.24,5.5,8.28,9.7A27.21,27.21,0,0,1,336.71,154.82Z"
                            style="fill: rgb(250, 250, 250); transform-origin: 261.99px 248.479px;" id="elb0perdyiune"
                            class="animable"></path>
                        <path
                            d="M198.46,361.89c26.15,15.6,94.17,56.19,127.84,76.47a6.61,6.61,0,0,0,10-5.67V151.37a18.36,18.36,0,0,0-9.07-15.83L197.85,59.71a6.61,6.61,0,0,0-10,5.71V343.27A21.69,21.69,0,0,0,198.46,361.89Z"
                            style="fill: rgb(250, 250, 250); transform-origin: 262.075px 249.035px;"
                            id="el0h81lggl042" class="animable"></path>
                        <path
                            d="M198,362.76q31.48,18.78,63,37.6,18.39,11,36.77,22l16.43,9.85,7.31,4.4c2.23,1.34,4.6,3.28,7.24,3.63a7.71,7.71,0,0,0,8.64-7.59c0-.49,0-1,0-1.47V172c0-6.76,0-13.51,0-20.26a19.85,19.85,0,0,0-9.88-17.28c-2.95-1.75-5.92-3.47-8.88-5.21l-42.38-24.83L225.9,75c-9.08-5.32-18.1-10.74-27.23-16a7.73,7.73,0,0,0-11.78,6.81c0,2.22,0,4.45,0,6.67V320.43q0,11.06,0,22.09A23.28,23.28,0,0,0,198,362.76c1.1.67,2.1-1.06,1-1.73-6.79-4.17-10.08-11.21-10.08-19v-255c0-7,0-14,0-21a6.1,6.1,0,0,1,2-4.88c2.24-1.9,4.93-1.51,7.26-.15l10,5.87L251,92l49.15,28.8c8.78,5.15,17.58,10.25,26.33,15.43a17.91,17.91,0,0,1,8.84,15.83V430.71c0,.6,0,1.21,0,1.81a5.7,5.7,0,0,1-8.84,4.79c-10.33-6.09-20.56-12.36-30.84-18.52Q260,397.42,224.23,376.11L199,361A1,1,0,0,0,198,362.76Z"
                            style="fill: rgb(235, 235, 235); transform-origin: 262.138px 249.074px;"
                            id="eleg53qn1duzj" class="animable"></path>
                        <path
                            d="M205.26,100.6c0,2.13-1.5,3-3.34,1.93a7.41,7.41,0,0,1-3.34-5.78c0-2.13,1.5-3,3.34-1.93A7.38,7.38,0,0,1,205.26,100.6Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 201.92px 98.675px;" id="el7bltl1ix41r"
                            class="animable"></path>
                        <path
                            d="M201.92,102.53h0c-2.72-1.58-4.93.09-4.93,3.73v1.12l9.86,5.7V112C206.85,108.32,204.64,104.1,201.92,102.53Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 201.92px 107.507px;" id="elbdq4ic9aezm"
                            class="animable"></path>
                        <path
                            d="M327.25,135.54,197.85,59.71a6.61,6.61,0,0,0-10,5.71v12.2h0l148.39,85.67V151.37A18.36,18.36,0,0,0,327.25,135.54Z"
                            style="fill: rgb(235, 235, 235); transform-origin: 262.045px 111.032px;"
                            id="elwjcrpe0pgtk" class="animable"></path>
                        <g id="eldjpi2dazw1">
                            <ellipse cx="262.11" cy="203.39" rx="34.06" ry="58.99"
                                style="fill: rgb(69, 90, 100); transform-origin: 262.11px 203.39px; transform: rotate(-30deg);"
                                class="animable"></ellipse>
                        </g>
                        <path
                            d="M243.62,181.55s-2.72,1.37-.52,7.75-2.77,9.57-4.07,7.06c0,0,.09,4,5,4a5.57,5.57,0,0,0,5.78-4.06s1.77,1.93,1.77,7.37-5.2,25.89,13,25.89,17.83-15.49,17.83-15.49,4.66.09,4.66-6.88c0,0-7.08,4.4-7.08-5.43s1.62-22.26-5.88-22.26c0,0,2.58-5.34-2.55-8.75S251,172,251,172s-4.63-2.78-7.95.5C239,176.52,243.62,181.55,243.62,181.55Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 263.05px 199.531px;" id="el3se5hqw5g05"
                            class="animable"></path>
                        <path
                            d="M252.44,210.17l-.63,10.92-1.24,21.5-.14.31a87.81,87.81,0,0,1-9.87-10.69q-1.84-2.37-3.57-4.85c1-4,1.91-7.58,2.64-10,1.86-6.1,8.48-7.06,11.41-7.18C251.9,210.14,252.44,210.17,252.44,210.17Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 244.715px 226.53px;" id="elsrep87ldrh"
                            class="animable"></path>
                        <path
                            d="M279.39,257.21a27,27,0,0,1-3.8-.44,42.59,42.59,0,0,1-13.48-5.22,67,67,0,0,1-11.68-8.65,87.81,87.81,0,0,1-9.87-10.69,12.15,12.15,0,0,1,0-3.35c.8-5.82,7.36-13.71,10.36-17.07.92-1,1.5-1.62,1.5-1.62l5-.13,11.23.62,5.16,1.41h0a1.53,1.53,0,0,1,1.09,1.37l.91,13.19.38,5.43-.6,2.1h0l-2.32,8.2a6.29,6.29,0,0,0,1,5.4c.4.55.86,1.2,1.32,1.94A39.61,39.61,0,0,1,279.39,257.21Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 259.917px 233.625px;" id="el46azv4z2xi"
                            class="animable"></path>
                        <path d="M268.66,210.65l-14.31,9.27a.67.67,0,0,1-1-.84l4.06-9V195.16h11.23Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 260.968px 207.608px;"
                            id="el7qw48spurxv" class="animable"></path>
                        <path d="M257.43,208.74a18,18,0,0,0,10.31-9.81v-3.77H257.43Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 262.585px 201.95px;" id="eldkmni1i4o49"
                            class="animable"></path>
                        <path
                            d="M254.82,176.75s-10.27.61-9,18.16c.58,8.12,2.49,12.32,8.74,12,7.08-.35,17.13-5.21,16.47-19.1S254.82,176.75,254.82,176.75Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 258.386px 191.72px;" id="eldq1jzyy5ml8"
                            class="animable"></path>
                        <path
                            d="M268.66,195.16s-2.82.74-2.82-3.29c0,0-12.5-.85-15.27-13.26,0,0,1.24-3.72,9.05-3.72S274,181.8,272,191.29Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 261.466px 185.052px;" id="el17quyagetms"
                            class="animable"></path>
                        <polygon points="253.34 191.39 253.34 197.42 249.81 196.34 253.34 191.39"
                            style="fill: rgb(242, 143, 143); transform-origin: 251.575px 194.405px;"
                            id="elpoxqzcoym7h" class="animable"></polygon>
                        <path d="M258.66,192a1.23,1.23,0,1,1-1.23-1.23A1.23,1.23,0,0,1,258.66,192Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 257.43px 192px;" id="el1yrulboktfk"
                            class="animable"></path>
                        <path d="M250.57,191.17a1.23,1.23,0,1,1-1.23-1.23A1.23,1.23,0,0,1,250.57,191.17Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 249.34px 191.17px;" id="elw1df6q661wp"
                            class="animable"></path>
                        <path d="M247.85,188.61l2.4-1.43s-.92-1-1.84-.38A1.67,1.67,0,0,0,247.85,188.61Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 249.012px 187.604px;" id="el9r1hcpyp2op"
                            class="animable"></path>
                        <path d="M253.65,199.42a6.3,6.3,0,0,0,4-1.06s.27,2.09-1.48,2.49A2.27,2.27,0,0,1,253.65,199.42Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 255.658px 199.623px;"
                            id="elhdai6gl453p" class="animable"></path>
                        <path
                            d="M267.66,195.61a6.72,6.72,0,0,1,.56-3A3.13,3.13,0,0,1,271,190.5c3.15-.09,3.58,2.95,3.53,4-.11,2.84-2.41,5.9-6.68,6Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 271.093px 195.499px;"
                            id="elyv68ogywl2l" class="animable"></path>
                        <path
                            d="M288.92,255.78a22.62,22.62,0,0,1-9.53,1.43,27,27,0,0,1-3.8-.44v-7l0-15.54h0a34.22,34.22,0,0,1-2.61-6c-3.27-10.19.83-16,.83-16a27.38,27.38,0,0,1,8.42,3.65,11.86,11.86,0,0,1,4.28,5.05C289.41,227.46,289.59,237,288.92,255.78Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 280.479px 234.744px;"
                            id="elvb3p6kx8yvh" class="animable"></path>
                        <g id="elg0jq84qwv8a">
                            <path d="M268,236.29a11.21,11.21,0,0,1-12.47,3.43S263.31,245.39,268,236.29Z"
                                style="opacity: 0.2; transform-origin: 261.765px 238.878px;" class="animable">
                            </path>
                        </g>
                        <path
                            d="M322.09,167.09c0,.88-.61,1.24-1.38.8a3.06,3.06,0,0,1-1.38-2.4c0-.88.62-1.23,1.38-.79A3,3,0,0,1,322.09,167.09Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 320.71px 166.294px;" id="elkuunl4y7rce"
                            class="animable"></path>
                        <path
                            d="M322.09,173.34c0,.88-.61,1.24-1.38.8a3.07,3.07,0,0,1-1.38-2.4c0-.88.62-1.24,1.38-.79A3,3,0,0,1,322.09,173.34Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 320.71px 172.542px;" id="el78pjnk69nt8"
                            class="animable"></path>
                        <path
                            d="M322.09,179.59c0,.88-.61,1.24-1.38.8a3.07,3.07,0,0,1-1.38-2.4c0-.88.62-1.24,1.38-.79A3,3,0,0,1,322.09,179.59Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 320.71px 178.792px;" id="el5jwyx8327oa"
                            class="animable"></path>
                        <path
                            d="M325.9,386.77a.57.57,0,0,1-.25-.06L198.06,313a.49.49,0,0,1-.18-.68.51.51,0,0,1,.68-.19l127.59,73.67a.51.51,0,0,1,.19.68A.52.52,0,0,1,325.9,386.77Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 262.105px 349.42px;" id="elo9cxratmk9k"
                            class="animable"></path>
                        <path
                            d="M325.9,373.84a.47.47,0,0,1-.25-.07L198.06,300.11a.51.51,0,0,1-.18-.69.49.49,0,0,1,.68-.18l127.59,73.67a.5.5,0,0,1,.19.68A.52.52,0,0,1,325.9,373.84Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 262.108px 336.505px;" id="ells8nk5irln"
                            class="animable"></path>
                        <path
                            d="M325.9,360.91a.59.59,0,0,1-.25-.07L198.06,287.17a.5.5,0,0,1,.5-.86L326.15,360a.52.52,0,0,1,.19.69A.52.52,0,0,1,325.9,360.91Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 262.128px 323.588px;" id="elekwqqlsdtnh"
                            class="animable"></path><text transform="matrix(0.87, 0.5, 0, 1, 245.61, 132.33)"
                            style="font-size:10.802305221557617px;fill:#455a64;font-family:Montserrat-Bold, Montserrat;font-weight:700">Pr
                            <tspan x="11.99" y="0" style="letter-spacing:-0.007955365951778866em">o</tspan>
                            <tspan x="18.8" y="0">file</tspan>
                        </text><text transform="matrix(0.87, 0.5, 0, 1, 237.18, 260.69)"
                            style="font-size:10.731518745422363px;fill:#455a64;font-family:Montserrat-Bold, Montserrat;font-weight:700">
                            <tspan style="letter-spacing:-0.06306174446893234em">Y</tspan>
                            <tspan x="6.66" y="0">ourname</tspan>
                        </text><text transform="matrix(0.87, 0.5, 0, 1, 264.82, 376.61)"
                            style="font-size:9.37486743927002px;fill:#60A5FA;font-family:Montserrat-Bold, Montserrat;font-weight:700">600
                            <tspan x="17.35" y="0" xml:space="preserve" style="fill:#455a64"> Foll</tspan>
                            <tspan x="37.91" y="0" style="fill:#455a64;letter-spacing:-0.017083334585779753em">ow
                            </tspan>
                            <tspan x="52.39" y="0" style="fill:#455a64">ers</tspan>
                        </text><text transform="matrix(0.87, 0.5, 0, 1, 198.05, 338)"
                            style="font-size:9.37486743927002px;fill:#60A5FA;font-family:Montserrat-Bold, Montserrat;font-weight:700">500
                            <tspan x="17.35" y="0" xml:space="preserve" style="fill:#455a64"> Foll</tspan>
                            <tspan x="37.91" y="0" style="fill:#455a64;letter-spacing:-0.017083334585779753em">o
                            </tspan>
                            <tspan x="43.73" y="0" style="fill:#455a64">wing</tspan>
                        </text><text transform="matrix(0.87, 0.5, 0, 1, 232.81, 271.69)"
                            style="font-size:10.731518745422363px;fill:#60A5FA;font-family:Montserrat-Medium, Montserrat;font-weight:500">@username</text><text
                            transform="matrix(0.87, 0.5, 0, 1, 226.42, 288.12)"
                            style="font-size:10.731518745422363px;fill:#455a64;font-family:Montserrat-Medium, Montserrat;font-weight:500">Bio
                            description</text>
                    </g>
                    <g id="freepik--Character--inject-73" class="animable"
                        style="transform-origin: 138.369px 266.779px;">
                        <path
                            d="M140.4,361.82s3.24-.71,3.09,3.09c-.16,4,2.79,9.39-4.46,11.33A27.28,27.28,0,0,0,128.4,382c-2.64,2.07-9.77,4.1-15.14,1.7-9.87-4.42,3.56-9.76,3.56-9.76Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 126.795px 373.277px;" id="el3n2id7lgjp8"
                            class="animable"></path>
                        <path
                            d="M178.62,361.87s2-1.58,3.08,6.61,9.9,28.88-4.07,28.88c-7.17,0-7.8-11.16-7.77-18.77s-.27-14.89.72-16.16S178.62,361.87,178.62,361.87Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 177.638px 379.516px;" id="el8i7ig1j70d5"
                            class="animable"></path>
                        <path
                            d="M147.75,293.64a54.06,54.06,0,0,0-1,9.12c0,3.86.67,14.3,0,21.07s-4.5,32.76-4.77,34.51a16.55,16.55,0,0,0,.2,4.09,1.79,1.79,0,0,1-.71,1.72c-2.13,1.59-7.5,5.62-9.29,7.08-2.26,1.85-8.86,10.46-15.35,2.73,0,0,14.3-9.66,15-13.87s-2.17-40.69-3-45-1-30.3-1-30.3Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 132.29px 330.959px;" id="elj9ya3rfgv88"
                            class="animable"></path>
                        <path
                            d="M176.75,290v8a15.21,15.21,0,0,0,.21,2.52c.71,4.26,3,18.87,3.25,30.55.28,13.84.09,26.16-.5,31.33s2.49,15.13,2.76,16.65c.61,3.43.09,5.62-5,5.67-3.2,0-5.34-.6-5.61-5.55s-.83-14.46-.83-14.46-6.91-32.49-8.12-37.9-7.4-31.38-7.8-34Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 168.892px 337.36px;" id="elc1kry43iuit"
                            class="animable"></path>
                        <path
                            d="M132,149.74s-3,1.54-.57,8.69-3.12,10.72-4.57,7.91c0,0,.1,4.54,5.6,4.54s6.49-4.56,6.49-4.56,2,2.17,2,8.27-5.82,29,14.56,29,20-17.36,20-17.36,5.23.09,5.23-7.72c0,0-7.94,4.93-7.94-6.09s1.81-25-6.6-25c0,0,2.89-6-2.86-9.82s-23,1.38-23,1.38-5.19-3.11-8.91.57C126.9,144.09,132,149.74,132,149.74Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 153.8px 169.894px;" id="el2zm6v3etly3"
                            class="animable"></path>
                        <path
                            d="M141.94,181.83A21.13,21.13,0,0,0,129.85,186c-5.94,4.4-16.37,12-16.37,12S101.75,182.77,99.4,178l-7.57,5.56s11.41,29.94,19.72,29.94c6.19,0,24.31-13.67,24.31-13.67Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 116.885px 195.75px;" id="elwb0ncfys3u"
                            class="animable"></path>
                        <path
                            d="M100.66,180.18a9.94,9.94,0,0,0,.15-6.67c-.34-1.11.6-4.31,0-4.78s-2.84-.43-3.45,3.93A14.79,14.79,0,0,1,95,167.35c-.61-3-1.13-6.93-4.38-4.61s-7.24,7.37-4.16,12.35c3,4.81,5.33,8.45,5.33,8.45Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 93.3336px 172.789px;"
                            id="el39bwab6glie" class="animable"></path>
                        <path
                            d="M172.26,234.81s2.39,5.26,3.79,16.4.7,38.82.7,38.82a66.44,66.44,0,0,1-26,5.4,38.32,38.32,0,0,1-23.83-8.08s.26,1.17.26-18.91,4.31-32,4.31-32Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 151.922px 265.121px;" id="el1wim5hw333o"
                            class="animable"></path>
                        <path
                            d="M160.13,182.37l5.78,1.59a1.74,1.74,0,0,1,1.28,1.56l1.44,20.87L165.36,218a7.05,7.05,0,0,0,1.08,6.05,46.57,46.57,0,0,1,5.82,10.79s-6.74,8.53-22.27,8.53c-10.76,0-18.48-6.91-18.48-6.91a74.38,74.38,0,0,0,3.25-14.07,23.88,23.88,0,0,0-.93-8s-6.36-3-5.19-11.52,13.3-21,13.3-21l5.6-.15Z"
                            style="fill: rgb(96, 165, 250); transform-origin: 150.378px 212.545px;" id="el5e2wxvwqlui"
                            class="animable"></path>
                        <path d="M160.13,182.37l-16,10.4a.76.76,0,0,1-1.1-.94l4.56-10.15V165h12.59Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 151.576px 178.941px;" id="elwwwvkmap1c"
                            class="animable"></path>
                        <path d="M147.54,180.23a20.22,20.22,0,0,0,11.56-11V165H147.54Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 153.32px 172.615px;" id="elx71tnxj354o"
                            class="animable"></path>
                        <path
                            d="M144.6,144.36s-11.51.67-10.09,20.36c.66,9.1,2.79,13.82,9.8,13.47,7.94-.39,19.22-5.85,18.48-21.42S144.6,144.36,144.6,144.36Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 148.607px 161.152px;"
                            id="el0f2a0sxbnkdj" class="animable"></path>
                        <path
                            d="M160.13,165s-3.16.83-3.16-3.69c0,0-14-.95-17.12-14.87,0,0,1.38-4.17,10.14-4.17s16.12,7.74,13.83,18.39Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 152.046px 153.665px;" id="el1flzmb655br"
                            class="animable"></path>
                        <polygon points="142.95 160.77 142.95 167.54 138.99 166.32 142.95 160.77"
                            style="fill: rgb(242, 143, 143); transform-origin: 140.97px 164.155px;" id="elloosgwkr1st"
                            class="animable"></polygon>
                        <circle cx="147.54" cy="161.49" r="1.38"
                            style="fill: rgb(38, 50, 56); transform-origin: 147.54px 161.49px;" id="el938u3umbc7m"
                            class="animable"></circle>
                        <path d="M139.85,160.53a1.38,1.38,0,1,1-1.38-1.38A1.38,1.38,0,0,1,139.85,160.53Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 138.47px 160.53px;" id="elkk4dihe1coj"
                            class="animable"></path>
                        <path d="M136.79,157.66l2.69-1.61s-1-1.07-2.06-.43A1.9,1.9,0,0,0,136.79,157.66Z"
                            style="fill: rgb(38, 50, 56); transform-origin: 138.093px 156.538px;" id="elc5v2qoa04ul"
                            class="animable"></path>
                        <path d="M143.29,169.78a7,7,0,0,0,4.44-1.19s.31,2.34-1.65,2.79A2.55,2.55,0,0,1,143.29,169.78Z"
                            style="fill: rgb(242, 143, 143); transform-origin: 145.519px 170.002px;"
                            id="elfuqmlvmuab7" class="animable"></path>
                        <path
                            d="M159,165.51a7.61,7.61,0,0,1,.62-3.34,3.54,3.54,0,0,1,3.07-2.4c3.53-.1,4,3.31,4,4.52-.12,3.18-2.7,6.62-7.5,6.75Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 162.842px 165.404px;"
                            id="elcrvci404qm7" class="animable"></path>
                        <path
                            d="M166,184s-5.78,6.82,2.66,22.41,9.13,16.89,9.13,16.89-5.77,16.88-8,25.57l8.63,4.71s9.14-19.12,11.31-23.29,2.24-7.39,0-13.09-8.89-19.89-10.63-24S171.81,185.58,166,184Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 177.726px 218.79px;" id="elltzamman03o"
                            class="animable"></path>
                        <path
                            d="M169.79,248.85s-2.24-.06-4.74,3.13c-.71.91-3.87,2-4,2.7s1.29,2.57,5.21.56a14.75,14.75,0,0,1-3,5c-2.09,2.21-5,4.9-1.25,6.23s10.19,1.7,12.5-3.68c2.24-5.19,3.86-9.22,3.86-9.22Z"
                            style="fill: rgb(255, 168, 167); transform-origin: 169.285px 258.08px;" id="ellf1uxs0p56q"
                            class="animable"></path>
                        <g id="elc26oq9d6e0j">
                            <path d="M159.33,211.13s-5.34,7-14,3.85C145.34,215,154.13,221.34,159.33,211.13Z"
                                style="opacity: 0.2; transform-origin: 152.33px 214.037px;" class="animable">
                            </path>
                        </g>
                    </g>
                    <defs>
                        <filter id="active" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2">
                            </feMorphology>
                            <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                            </feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                        </filter>
                        <filter id="hover" height="200%">
                            <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2">
                            </feMorphology>
                            <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>
                            <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE">
                            </feComposite>
                            <feMerge>
                                <feMergeNode in="OUTLINE"></feMergeNode>
                                <feMergeNode in="SourceGraphic"></feMergeNode>
                            </feMerge>
                            <feColorMatrix type="matrix"
                                values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                            </feColorMatrix>
                        </filter>
                    </defs>
                </svg>

                <form method="post" action="{{ route('user.profile.update', ['id' => auth()->user()->id]) }}"
                    class="flex justify-center" enctype="multipart/form-data" class="w-full mx-auto">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="file" id="file-upload" name="profile" class="hidden" />
                        <label for="file-upload" class="cursor-pointer flex items-center space-x-2">
                            <img src="{{ asset('/post/add-item2.svg') }}" alt="not found" class="w-[20px]">
                            <span class="text-slate-600">Upload Image</span>
                        </label>
                    </div>
                    <div class="divider divider-horizontal"></div>
                    <div
                        class="flex justify-center gap-1 items-center transition-all duration-300 ease-in-out delay-50 hover:ml-3">
                        <button type="submit" class="">Update</button>
                        <img src="{{ asset('update/next-slate.svg') }}" alt="not found" class="w-[20px]">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
