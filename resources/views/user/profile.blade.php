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
                    <div class="flex justify-start gap-5 items-center">
                        <div class="text-md font-light">{{ count(auth()->user()->followers) }} followers</div>
                        <div class="text-md font-light">{{ count(auth()->user()->following) }} following</div>
                    </div>

                </div>
            </div>
            <div class="">
                <a href="{{ route('user.edit.view') }}" class="flex justify-center items-center gap-1">
                    <img src="{{ asset('/profile/edit.svg') }}" alt="not found" class="w-[23px]">
                    <div class="text-sm text-slate-600">Edit</div>
                </a>
            </div>
        </div>
        <div class="">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="p-20 flex flex-col gap-8">
                        <div class="flex justify-start items-center w-full gap-6">
                            <img src="{{ Storage::url($post->user->profile->path) }}" alt="not found"
                                class="rounded-full w-[60px] h-[60px]">
                            <div class="flex flex-col">
                                <div class="text-slate-600 text-md font-bold">
                                    {{ $post->user->username }}
                                </div>
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
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('/post/like.svg') }}" alt="not found" class="w-[23px]">
                                    <div class="text-lg text-slate-600">like</div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('/post/comment.svg') }}" alt="not found" class="w-[20px]">
                                    <div class="text-lg text-slate-600">comment</div>
                                </div>
                                <form action="/posts/delete/{{ $post->id }}" method="post" class="mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-lg text-red-400 flex justify-center items-center gap-2">
                                        <img src="{{ asset('/post/delete-1.svg') }}" alt="not found"
                                            class="w-[22px]">delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="flex justify-center items-center">
                    <div class="flex flex-col gap-1">
                        {{-- <img src="{{ asset('added/no-posts.svg') }}" class="w-[500px]"></img>
                        <div class="text-slate-400 w-full text-center">
                            you don't have any post yet, <a href="{{ route('posts.new.view') }}"
                                class="text-blue-400 hover:underline">create
                                one</a></div> --}}
                        <div class="w-[300px]">
                            <svg class="animated" id="freepik_stories-posts" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs">
                                <style>
                                    svg>freepik_stories-posts:not(.animated) .animable {
                                        opacity: 0;
                                    }

                                    svg#freepik_stories-posts.animated #freepik--background-complete--inject-1 {
                                        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideUp;
                                        animation-delay: 0s;
                                    }

                                    svg#freepik_stories-posts.animated #freepik--Graphics--inject-1 {
                                        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideLeft;
                                        animation-delay: 0s;
                                    }

                                    svg#freepik_stories-posts.animated #freepik--Character--inject-1 {
                                        animation: 1s 1 forwards cubic-bezier(.36, -0.01, .5, 1.38) slideDown, 1.5s Infinite linear floating;
                                        animation-delay: 0s, 1s;
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

                                    @keyframes slideLeft {
                                        0% {
                                            opacity: 0;
                                            transform: translateX(-30px);
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
                                <g id="freepik--background-complete--inject-1" class="animable"
                                    style="transform-origin: 250px 226.88px;">
                                    <rect y="382.4" width="500" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 250px 382.525px;"
                                        id="elxhq7iwnf30l" class="animable"></rect>
                                    <rect x="413.5" y="396.43" width="10.61" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 418.805px 396.555px;"
                                        id="el4xr7n3tvgm8" class="animable"></rect>
                                    <rect x="363.01" y="396.55" width="43.15" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 384.585px 396.675px;"
                                        id="ellay5jhgw2tr" class="animable"></rect>
                                    <rect x="236.85" y="394.17" width="72.82" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 273.26px 394.295px;"
                                        id="elf76z7udf1nc" class="animable"></rect>
                                    <rect x="171.85" y="398.51" width="23.11" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 183.405px 398.635px;"
                                        id="el60f6ba83gcs" class="animable"></rect>
                                    <rect x="86.13" y="394.29" width="31.82" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 102.04px 394.415px;"
                                        id="elzybrwdckek8" class="animable"></rect>
                                    <rect x="123.5" y="394.29" width="29.74" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 138.37px 394.415px;"
                                        id="eljs66gz8ocy" class="animable"></rect>
                                    <rect x="65.29" y="389.92" width="30.37" height="0.25"
                                        style="fill: rgb(224, 224, 224); transform-origin: 80.475px 390.045px;"
                                        id="elg3zgdqj5idu" class="animable"></rect>
                                    <path
                                        d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z"
                                        style="fill: rgb(224, 224, 224); transform-origin: 140.46px 196.4px;"
                                        id="elv1ak7fjql5" class="animable"></path>
                                    <path
                                        d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z"
                                        style="fill: rgb(224, 224, 224); transform-origin: 356.75px 196.4px;"
                                        id="el6dcaxrqaob2" class="animable"></path>
                                    <rect x="60" y="75.47" width="378" height="287.54" rx="7.52"
                                        style="fill: rgb(224, 224, 224); transform-origin: 249px 219.24px;"
                                        id="el92o3u9u7054" class="animable"></rect>
                                    <rect x="62" y="75.47" width="378" height="287.54" rx="7.52"
                                        style="fill: rgb(235, 235, 235); transform-origin: 251px 219.24px;"
                                        id="elp4xnqrgz6je" class="animable"></rect>
                                    <path
                                        d="M62,94.91V355.49A7.54,7.54,0,0,0,69.52,363h363a7.54,7.54,0,0,0,7.52-7.52V94.91Z"
                                        style="fill: rgb(224, 224, 224); transform-origin: 251.02px 228.955px;"
                                        id="el300hv82gwc5" class="animable"></path>
                                    <rect x="63.39" y="104.91" width="375.22" height="248.1"
                                        style="fill: rgb(250, 250, 250); transform-origin: 251px 228.96px;"
                                        id="eldane1tgtj9n" class="animable"></rect>
                                    <path
                                        d="M425.34,330.31H76.66a.13.13,0,0,1-.12-.13V121a.12.12,0,0,1,.12-.12H425.34a.12.12,0,0,1,.12.12V330.18A.12.12,0,0,1,425.34,330.31Zm-348.55-.25H425.21V121.13H76.79Z"
                                        style="fill: rgb(224, 224, 224); transform-origin: 251px 225.595px;"
                                        id="elom1vy31ybaa" class="animable"></path>
                                    <path
                                        d="M78.5,89.75a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,78.5,89.75Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,78.5,81.75Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 78.5px 85.25px;"
                                        id="elt9qmb22vnjd" class="animable"></path>
                                    <path
                                        d="M92.67,89.75a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,92.67,89.75Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,92.67,81.75Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 92.67px 85.25px;"
                                        id="elpdykiqyjqqi" class="animable"></path>
                                    <path
                                        d="M106.85,89.75a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,106.85,89.75Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,106.85,81.75Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 106.85px 85.25px;"
                                        id="el47bsw7vml9s" class="animable"></path>
                                    <rect x="62" y="94.41" width="378" height="1"
                                        style="fill: rgb(224, 224, 224); transform-origin: 251px 94.91px;"
                                        id="elz5cggdxummk" class="animable"></rect>
                                    <rect x="95.67" y="129.56" width="172.92" height="176.24"
                                        style="fill: rgb(235, 235, 235); transform-origin: 182.13px 217.68px;"
                                        id="elfnaioszz9ei" class="animable"></rect>
                                    <rect x="302.61" y="129.56" width="114.17" height="57.33"
                                        style="fill: rgb(235, 235, 235); transform-origin: 359.695px 158.225px;"
                                        id="el5939c83bz4u" class="animable"></rect>
                                    <circle cx="324" cy="151" r="13"
                                        style="fill: rgb(250, 250, 250); transform-origin: 324px 151px;"
                                        id="elrusqq7vgmeq" class="animable"></circle>
                                    <rect x="349" y="138" width="56.33" height="5.33"
                                        style="fill: rgb(250, 250, 250); transform-origin: 377.165px 140.665px;"
                                        id="elhxw0my1xs4a" class="animable"></rect>
                                    <rect x="349" y="147.78" width="36.56" height="5.33"
                                        style="fill: rgb(250, 250, 250); transform-origin: 367.28px 150.445px;"
                                        id="el0rg42gs88zy" class="animable"></rect>
                                    <rect x="302.61" y="208.33" width="114.17" height="144.68"
                                        style="fill: rgb(235, 235, 235); transform-origin: 359.695px 280.67px;"
                                        id="elyng3xt9aaho" class="animable"></rect>
                                    <rect x="307.68" y="219.24" width="48.7" height="48.7"
                                        style="fill: rgb(250, 250, 250); transform-origin: 332.03px 243.59px;"
                                        id="elimvsqqbl1y" class="animable"></rect>
                                    <rect x="308.06" y="274.13" width="48.7" height="48.7"
                                        style="fill: rgb(250, 250, 250); transform-origin: 332.41px 298.48px;"
                                        id="el3u95det5oqz" class="animable"></rect>
                                    <rect x="363.02" y="219.24" width="48.7" height="25.83"
                                        style="fill: rgb(250, 250, 250); transform-origin: 387.37px 232.155px;"
                                        id="elo2n3mwgr83" class="animable"></rect>
                                    <rect x="363.02" y="251.27" width="48.7" height="48.7"
                                        style="fill: rgb(250, 250, 250); transform-origin: 387.37px 275.62px;"
                                        id="elzu3h15m0ruq" class="animable"></rect>
                                    <rect x="308.06" y="328.66" width="48.7" height="24.35"
                                        style="fill: rgb(250, 250, 250); transform-origin: 332.41px 340.835px;"
                                        id="el6wlz2vefmv" class="animable"></rect>
                                    <rect x="363.02" y="305.8" width="48.7" height="47.21"
                                        style="fill: rgb(250, 250, 250); transform-origin: 387.37px 329.405px;"
                                        id="elsiald8l8eoa" class="animable"></rect>
                                </g>
                                <g id="freepik--Shadow--inject-1" class="animable"
                                    style="transform-origin: 250px 416.24px;">
                                    <ellipse cx="250" cy="416.24" rx="193.89" ry="11.32"
                                        style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;"
                                        id="el3oeyxk43kc5" class="animable"></ellipse>
                                </g>
                                <g id="freepik--Graphics--inject-1" class="animable"
                                    style="transform-origin: 182.43px 268.24px;">
                                    <rect x="80.43" y="359.19" width="199.78" height="50.33" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 180.32px 384.355px;"
                                        id="elf6q03t92a4s" class="animable"></rect>
                                    <rect x="82.54" y="361.3" width="199.78" height="50.33" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 182.43px 386.465px;"
                                        id="elqsz0w1qrdpq" class="animable"></rect>
                                    <g id="elurojqq2m6w">
                                        <rect x="82.54" y="361.3" width="199.78" height="50.33" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.6; transform-origin: 182.43px 386.465px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="84.65" y="363.41" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 184.54px 388.58px;"
                                        id="elwli7g6jkr6" class="animable"></rect>
                                    <g id="el8yptxe31i2">
                                        <rect x="84.65" y="363.41" width="199.78" height="50.34" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.8; transform-origin: 184.54px 388.58px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="136.57" y="371.92" width="100.93" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 187.035px 375.73px;"
                                        id="el5esoql6wti7" class="animable"></rect>
                                    <rect x="136.57" y="384.77" width="47.32" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 160.23px 388.58px;"
                                        id="el2nbkjja11jn" class="animable"></rect>
                                    <rect x="188.68" y="384.77" width="37.21" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 207.285px 388.58px;"
                                        id="elh5r11mrmqi" class="animable"></rect>
                                    <rect x="136.57" y="397.62" width="119.47" height="2.87" rx="1.04"
                                        style="fill: rgb(96, 165, 250); transform-origin: 196.305px 399.055px;"
                                        id="elbw11b4gl4fm" class="animable"></rect>
                                    <g id="elu6vgpi8prf">
                                        <rect x="136.57" y="397.62" width="119.47" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); opacity: 0.5; transform-origin: 196.305px 399.055px;"
                                            class="animable"></rect>
                                    </g>
                                    <g id="el4tohsrej23y">
                                        <circle cx="108.92" cy="388.58" r="17.93"
                                            style="fill: rgb(96, 165, 250); transform-origin: 108.92px 388.58px; transform: rotate(-76.61deg);"
                                            class="animable"></circle>
                                    </g>
                                    <path d="M123.72,388.58a14.8,14.8,0,1,1-14.8-14.8A14.67,14.67,0,0,1,123.72,388.58Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 108.92px 388.58px;"
                                        id="eltp223onf3t" class="animable"></path>
                                    <path d="M121.93,395.63a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.93px 397.526px;"
                                        id="el0vymigcz2hb" class="animable"></path>
                                    <g id="el9ej8ypo08e">
                                        <path d="M121.93,395.63a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.93px 397.526px;"
                                            class="animable"></path>
                                    </g>
                                    <circle cx="108.92" cy="383.52" r="6.59"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.92px 383.52px;"
                                        id="el62b1lbqhmnf" class="animable"></circle>
                                    <g id="ellhr4lt8fmnc">
                                        <circle cx="108.92" cy="383.52" r="6.59"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.92px 383.52px;"
                                            class="animable"></circle>
                                    </g>
                                    <rect x="80.43" y="300.95" width="199.78" height="50.33" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 180.32px 326.115px;"
                                        id="el1pnkh04qt35" class="animable"></rect>
                                    <rect x="82.54" y="303.06" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 182.43px 328.23px;"
                                        id="elv3airbnggy" class="animable"></rect>
                                    <g id="elkd2bzr6301">
                                        <rect x="82.54" y="303.06" width="199.78" height="50.34" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.6; transform-origin: 182.43px 328.23px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="84.65" y="305.17" width="199.78" height="50.33" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 184.54px 330.335px;"
                                        id="elxfsxyjknd1" class="animable"></rect>
                                    <g id="eljh7b6zjw8z">
                                        <rect x="84.65" y="305.17" width="199.78" height="50.33" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.8; transform-origin: 184.54px 330.335px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="136.57" y="313.68" width="32.76" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 152.95px 317.49px;"
                                        id="elzuxrzfp59i8" class="animable"></rect>
                                    <rect x="173.58" y="313.68" width="26.17" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 186.665px 317.49px;"
                                        id="eltbv6inyavr" class="animable"></rect>
                                    <rect x="136.57" y="326.53" width="105.43" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 189.285px 330.34px;"
                                        id="elw4tsq5n9h7" class="animable"></rect>
                                    <rect x="136.57" y="339.38" width="72.93" height="2.87" rx="1.04"
                                        style="fill: rgb(96, 165, 250); transform-origin: 173.035px 340.815px;"
                                        id="el8v3rupto9p8" class="animable"></rect>
                                    <g id="elrwcgi5vnvir">
                                        <rect x="136.57" y="339.38" width="72.93" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); opacity: 0.5; transform-origin: 173.035px 340.815px;"
                                            class="animable"></rect>
                                    </g>
                                    <g id="el483dat6eku4">
                                        <circle cx="108.92" cy="330.34" r="17.93"
                                            style="fill: rgb(96, 165, 250); transform-origin: 108.92px 330.34px; transform: rotate(-76.61deg);"
                                            class="animable"></circle>
                                    </g>
                                    <path d="M123.72,330.34a14.8,14.8,0,1,1-14.8-14.8A14.67,14.67,0,0,1,123.72,330.34Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 108.92px 330.34px;"
                                        id="elp1dgui1bpnq" class="animable"></path>
                                    <path d="M121.93,337.39a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.93px 339.286px;"
                                        id="el680axttaokr" class="animable"></path>
                                    <g id="elmdhvf1p93wa">
                                        <path d="M121.93,337.39a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.93px 339.286px;"
                                            class="animable"></path>
                                    </g>
                                    <circle cx="108.92" cy="325.28" r="6.59"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.92px 325.28px;"
                                        id="elcaf5h6vhgzr" class="animable"></circle>
                                    <g id="el8thc2bpbpcx">
                                        <circle cx="108.92" cy="325.28" r="6.59"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.92px 325.28px;"
                                            class="animable"></circle>
                                    </g>
                                    <rect x="80.43" y="242.71" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 180.32px 267.88px;"
                                        id="el8683xxzjq1i" class="animable"></rect>
                                    <rect x="82.54" y="244.82" width="199.78" height="50.33" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 182.43px 269.985px;"
                                        id="el0j6r1wcpqruv" class="animable"></rect>
                                    <g id="eloraf4pilh6l">
                                        <rect x="82.54" y="244.82" width="199.78" height="50.33" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.6; transform-origin: 182.43px 269.985px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="84.65" y="246.93" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 184.54px 272.1px;"
                                        id="elnvhqkcjiab" class="animable"></rect>
                                    <g id="elxbmkiqe6kz">
                                        <rect x="84.65" y="246.93" width="199.78" height="50.34" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.8; transform-origin: 184.54px 272.1px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="136.57" y="255.44" width="100.21" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 186.675px 259.25px;"
                                        id="elzzwzf8tkna" class="animable"></rect>
                                    <rect x="136.57" y="268.29" width="67.76" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 170.45px 272.1px;"
                                        id="ele8q35mykuw" class="animable"></rect>
                                    <rect x="209.99" y="268.29" width="9.76" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 214.87px 272.1px;"
                                        id="eld8u7k9ixkck" class="animable"></rect>
                                    <rect x="136.57" y="281.14" width="53.65" height="2.87" rx="1.04"
                                        style="fill: rgb(96, 165, 250); transform-origin: 163.395px 282.575px;"
                                        id="el757pdui91tv" class="animable"></rect>
                                    <g id="el13sx9k4fn2x">
                                        <rect x="136.57" y="281.14" width="53.65" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); opacity: 0.5; transform-origin: 163.395px 282.575px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="195.68" y="281.14" width="61.21" height="2.87" rx="1.04"
                                        style="fill: rgb(96, 165, 250); transform-origin: 226.285px 282.575px;"
                                        id="el7jkrrsypfw8" class="animable"></rect>
                                    <g id="elx860n83j46">
                                        <rect x="195.68" y="281.14" width="61.21" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); opacity: 0.5; transform-origin: 226.285px 282.575px;"
                                            class="animable"></rect>
                                    </g>
                                    <g id="el4hbhyk807xl">
                                        <circle cx="108.92" cy="272.1" r="17.93"
                                            style="fill: rgb(96, 165, 250); transform-origin: 108.92px 272.1px; transform: rotate(-45deg);"
                                            class="animable"></circle>
                                    </g>
                                    <path d="M123.72,272.1a14.8,14.8,0,1,1-14.8-14.8A14.67,14.67,0,0,1,123.72,272.1Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 108.92px 272.1px;"
                                        id="elcym3lln4go" class="animable"></path>
                                    <path d="M121.93,279.15a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.93px 281.046px;"
                                        id="elwabuxu6knrq" class="animable"></path>
                                    <g id="el76u0nibwu63">
                                        <path d="M121.93,279.15a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.93px 281.046px;"
                                            class="animable"></path>
                                    </g>
                                    <path d="M115.51,267a6.59,6.59,0,1,1-6.59-6.6A6.59,6.59,0,0,1,115.51,267Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.92px 266.99px;"
                                        id="elal30kbgmprg" class="animable"></path>
                                    <g id="els4hd4gjybjh">
                                        <path d="M115.51,267a6.59,6.59,0,1,1-6.59-6.6A6.59,6.59,0,0,1,115.51,267Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.92px 266.99px;"
                                            class="animable"></path>
                                    </g>
                                    <rect x="125.78" y="122.73" width="4.56" height="1"
                                        style="fill: rgb(96, 165, 250); transform-origin: 128.06px 123.23px;"
                                        id="elpegmqllpk9" class="animable"></rect>
                                    <rect x="107.78" y="122.73" width="10.78" height="1"
                                        style="fill: rgb(96, 165, 250); transform-origin: 113.17px 123.23px;"
                                        id="elytnbsom3cfs" class="animable"></rect>
                                    <rect x="80.43" y="126.23" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 180.32px 151.4px;"
                                        id="elur6cb6y8n4" class="animable"></rect>
                                    <rect x="82.54" y="128.34" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 182.43px 153.51px;"
                                        id="elzqmzvqe6j4n" class="animable"></rect>
                                    <g id="elrtt65fbdkdr">
                                        <rect x="82.54" y="128.34" width="199.78" height="50.34" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.6; transform-origin: 182.43px 153.51px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="84.65" y="130.45" width="199.78" height="50.34" rx="8.94"
                                        style="fill: rgb(96, 165, 250); transform-origin: 184.54px 155.62px;"
                                        id="el3ykz8y05y6x" class="animable"></rect>
                                    <g id="el2am9q1ma7gp">
                                        <rect x="84.65" y="130.45" width="199.78" height="50.34" rx="8.94"
                                            style="fill: rgb(250, 250, 250); opacity: 0.8; transform-origin: 184.54px 155.62px;"
                                            class="animable"></rect>
                                    </g>
                                    <rect x="136.57" y="138.96" width="92.26" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 182.7px 142.77px;"
                                        id="el9uqn6wmcuts" class="animable"></rect>
                                    <rect x="136.57" y="151.81" width="122.76" height="7.62" rx="1.91"
                                        style="fill: rgb(96, 165, 250); transform-origin: 197.95px 155.62px;"
                                        id="el35qc3ev5mu" class="animable"></rect>
                                    <rect x="136.57" y="164.66" width="34.54" height="2.87" rx="1.04"
                                        style="fill: rgb(96, 165, 250); transform-origin: 153.84px 166.095px;"
                                        id="elh0x8ykexgcw" class="animable"></rect>
                                    <g id="elcvvewahnvqr">
                                        <rect x="136.57" y="164.66" width="34.54" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); opacity: 0.5; transform-origin: 153.84px 166.095px;"
                                            class="animable"></rect>
                                    </g>
                                    <g id="elnpgz925lbye">
                                        <circle cx="108.92" cy="155.62" r="17.93"
                                            style="fill: rgb(96, 165, 250); transform-origin: 108.92px 155.62px; transform: rotate(-76.61deg);"
                                            class="animable"></circle>
                                    </g>
                                    <path d="M123.72,155.62a14.8,14.8,0,1,1-14.8-14.8A14.73,14.73,0,0,1,123.72,155.62Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 108.92px 155.62px;"
                                        id="elxzdefu6xh6h" class="animable"></path>
                                    <path d="M121.93,162.67a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.93px 164.566px;"
                                        id="elil2k686ww3" class="animable"></path>
                                    <g id="elsrjxn54gjik">
                                        <path d="M121.93,162.67a14.8,14.8,0,0,1-26,0,23.45,23.45,0,0,1,26,0Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.93px 164.566px;"
                                            class="animable"></path>
                                    </g>
                                    <circle cx="108.92" cy="150.55" r="6.59"
                                        style="fill: rgb(96, 165, 250); transform-origin: 108.92px 150.55px;"
                                        id="eld5qvpedi4vv" class="animable"></circle>
                                    <g id="elchg64owp9pv">
                                        <circle cx="108.92" cy="150.55" r="6.59"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 108.92px 150.55px;"
                                            class="animable"></circle>
                                    </g>
                                </g>
                                <g id="freepik--Character--inject-1" class="animable animator-active"
                                    style="transform-origin: 341.987px 280.028px;">
                                    <path d="M399.13,261.11l-6.56,3.41,7.35,5.71s4.94-4.14,3-7Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 397.971px 265.67px;"
                                        id="el352w3vfrlhy" class="animable"></path>
                                    <polygon
                                        points="388.82 271.47 395.09 275.83 399.92 270.23 392.57 264.52 388.82 271.47"
                                        style="fill: rgb(228, 137, 123); transform-origin: 394.37px 270.175px;"
                                        id="elc5tbzhlcjos" class="animable"></polygon>
                                    <path
                                        d="M401.67,204.4c.9,1.18,1.67,2.24,2.45,3.39s1.52,2.26,2.26,3.4c1.46,2.3,2.85,4.66,4.13,7.08a82.28,82.28,0,0,1,3.56,7.52l.79,2,.71,2c.25.66.44,1.36.65,2.05l.31,1,.07.26.12.43a9.07,9.07,0,0,1,.18.94,14.82,14.82,0,0,1-.4,5.66,33,33,0,0,1-1.41,4.34,62.61,62.61,0,0,1-3.68,7.53,101.89,101.89,0,0,1-9.09,13.38l-4.6-3c2.21-4.61,4.37-9.36,6.26-14a69,69,0,0,0,2.41-6.93,23,23,0,0,0,.71-3.22,5.9,5.9,0,0,0,0-2.14s0,0,0,0,0,.06,0,0l-.08-.2-.33-.83c-.21-.55-.41-1.09-.67-1.64l-.72-1.64-.79-1.65q-1.64-3.27-3.52-6.5c-1.27-2.14-2.58-4.28-4-6.38s-2.83-4.23-4.17-6.16Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 404.915px 234.89px;"
                                        id="el4scae58mp0u" class="animable"></path>
                                    <path
                                        d="M415.33,219.75,398.86,231.3s-1-2.16-2.39-5.31c-1.13-2.51-2.54-5.64-3.94-8.8-.57-1.28-1.13-2.56-1.68-3.81-3.81-8.68.64-14.93,8.46-13.77C406.2,200.64,415.33,219.75,415.33,219.75Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 402.397px 215.386px;"
                                        id="elopf89lirnc9" class="animable"></path>
                                    <path d="M397.26,207.73c.32,3.1.35,12.69-.79,18.26-1.13-2.51-2.54-5.64-3.94-8.8Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 394.991px 216.86px;"
                                        id="el6j5pgrrpvyt" class="animable"></path>
                                    <g id="eliyujce5tua">
                                        <path
                                            d="M397.26,207.73c.32,3.1.35,12.69-.79,18.26-1.13-2.51-2.54-5.64-3.94-8.8Z"
                                            style="fill: rgb(96, 165, 250); opacity: 0.8; transform-origin: 394.991px 216.86px;"
                                            class="animable"></path>
                                    </g>
                                    <g id="el28k1hdry0pv">
                                        <g style="opacity: 0.8; transform-origin: 394.991px 216.86px;"
                                            class="animable">
                                            <path
                                                d="M397.26,207.73c.32,3.1.35,12.69-.79,18.26-1.13-2.51-2.54-5.64-3.94-8.8Z"
                                                id="eltxw1utoehz" class="animable"
                                                style="transform-origin: 394.991px 216.86px;">
                                            </path>
                                            <g id="el6caeadw2u68">
                                                <path
                                                    d="M397.26,207.73c.32,3.1.35,12.69-.79,18.26-1.13-2.51-2.54-5.64-3.94-8.8Z"
                                                    style="opacity: 0.8; transform-origin: 394.991px 216.86px;"
                                                    class="animable">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                    <path
                                        d="M421.9,286.37,246.12,239.61a9,9,0,0,1-6.34-10.94l8.34-31.36A9,9,0,0,1,259.06,191l175.78,46.75a9,9,0,0,1,6.34,10.95L432.84,280A9,9,0,0,1,421.9,286.37Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 340.481px 238.683px;"
                                        id="elnhw8xzgvxi" class="animable"></path>
                                    <g id="elttbfz0m4ym">
                                        <path
                                            d="M421.9,286.37,246.12,239.61a9,9,0,0,1-6.34-10.94l8.34-31.36A9,9,0,0,1,259.06,191l175.78,46.75a9,9,0,0,1,6.34,10.95L432.84,280A9,9,0,0,1,421.9,286.37Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.8; transform-origin: 340.481px 238.683px;"
                                            class="animable"></path>
                                    </g>
                                    <path
                                        d="M423.39,289,247.62,242.19a9,9,0,0,1-6.35-10.94l8.35-31.35a9,9,0,0,1,10.94-6.35l175.77,46.76a9,9,0,0,1,6.35,10.94l-8.34,31.36A9,9,0,0,1,423.39,289Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 341.975px 241.275px;"
                                        id="elgu71aokpfz5" class="animable"></path>
                                    <g id="elw8fuwji5v5k">
                                        <path
                                            d="M423.39,289,247.62,242.19a9,9,0,0,1-6.35-10.94l8.35-31.35a9,9,0,0,1,10.94-6.35l175.77,46.76a9,9,0,0,1,6.35,10.94l-8.34,31.36A9,9,0,0,1,423.39,289Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.4; transform-origin: 341.975px 241.275px;"
                                            class="animable"></path>
                                    </g>
                                    <path
                                        d="M424.89,291.54,249.12,244.78a9,9,0,0,1-6.35-10.94l8.34-31.36a9,9,0,0,1,10.95-6.34l175.77,46.75a9,9,0,0,1,6.35,11l-8.35,31.35A9,9,0,0,1,424.89,291.54Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 343.482px 243.84px;"
                                        id="el7jqhj8nvl0s" class="animable"></path>
                                    <g id="elif0876lmmxr">
                                        <path
                                            d="M424.89,291.54,249.12,244.78a9,9,0,0,1-6.35-10.94l8.34-31.36a9,9,0,0,1,10.95-6.34l175.77,46.75a9,9,0,0,1,6.35,11l-8.35,31.35A9,9,0,0,1,424.89,291.54Z"
                                            style="opacity: 0.2; transform-origin: 343.482px 243.84px;"
                                            class="animable">
                                        </path>
                                    </g>
                                    <g id="eluo7mccgdw5n">
                                        <rect x="298.42" y="230.64" width="119.47" height="7.62" rx="1.91"
                                            style="fill: rgb(96, 165, 250); transform-origin: 358.155px 234.45px; transform: rotate(14.9deg);"
                                            class="animable"></rect>
                                    </g>
                                    <g id="elje5r2zxa6">
                                        <rect x="298.42" y="230.64" width="119.47" height="7.62" rx="1.91"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 358.155px 234.45px; transform: rotate(14.9deg);"
                                            class="animable"></rect>
                                    </g>
                                    <g id="elg910zfyopmf">
                                        <rect x="295.83" y="237.58" width="76.87" height="7.62" rx="1.91"
                                            style="fill: rgb(96, 165, 250); transform-origin: 334.265px 241.39px; transform: rotate(14.9deg);"
                                            class="animable"></rect>
                                    </g>
                                    <g id="eldfdtfg8z8bu">
                                        <rect x="295.83" y="237.58" width="76.87" height="7.62" rx="1.91"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 334.265px 241.39px; transform: rotate(14.9deg);"
                                            class="animable"></rect>
                                    </g>
                                    <g id="elqp2tqyvsq3r">
                                        <rect x="292.6" y="254.16" width="108.67" height="2.87" rx="1.04"
                                            style="fill: rgb(250, 250, 250); transform-origin: 346.935px 255.595px; transform: rotate(14.9deg);"
                                            class="animable"></rect>
                                    </g>
                                    <g id="elbh511dac01l">
                                        <circle cx="270.4" cy="224.4" r="17.93"
                                            style="fill: rgb(96, 165, 250); transform-origin: 270.4px 224.4px; transform: rotate(-55.196deg);"
                                            class="animable"></circle>
                                    </g>
                                    <path d="M284.7,228.2a14.8,14.8,0,1,1-10.5-18.11A14.71,14.71,0,0,1,284.7,228.2Z"
                                        style="fill: rgb(250, 250, 250); transform-origin: 270.408px 224.393px;"
                                        id="elqi03r7j86oq" class="animable"></path>
                                    <path d="M281.16,234.55A14.79,14.79,0,0,1,256,227.86a23.47,23.47,0,0,1,25.15,6.69Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 268.58px 232.91px;"
                                        id="elliz4hu08zq" class="animable"></path>
                                    <g id="el8n4uevb59ql">
                                        <path
                                            d="M281.16,234.55A14.79,14.79,0,0,1,256,227.86a23.47,23.47,0,0,1,25.15,6.69Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 268.58px 232.91px;"
                                            class="animable"></path>
                                    </g>
                                    <path d="M278.07,221.2a6.59,6.59,0,1,1-4.68-8.07A6.59,6.59,0,0,1,278.07,221.2Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 271.703px 219.5px;"
                                        id="elc1z7qwdcrm7" class="animable"></path>
                                    <g id="eljw9okivgza8">
                                        <path d="M278.07,221.2a6.59,6.59,0,1,1-4.68-8.07A6.59,6.59,0,0,1,278.07,221.2Z"
                                            style="fill: rgb(250, 250, 250); opacity: 0.7; transform-origin: 271.703px 219.5px;"
                                            class="animable"></path>
                                    </g>
                                    <path
                                        d="M388.94,178.12c-1.87,5.1-4.45,14.58-1.33,18.68,0,0-2.29,5.11-12.07,3.54-10.76-1.73-4.29-6.16-4.29-6.16,6.1-.46,6.64-4.84,6.28-9.1Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 379.131px 189.38px;"
                                        id="el0ww822suuq7c" class="animable"></path>
                                    <path
                                        d="M369,195.88c.55-.93.06-4.56.06-4.56s15.56-1.15,21,1.15c2.91,1.23,0,6.41,0,6.41Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 380.177px 194.956px;"
                                        id="elkw7uk9t2k2o" class="animable"></path>
                                    <g id="elwxc8c7kfbdh">
                                        <path
                                            d="M369,195.88c.55-.93.06-4.56.06-4.56s15.56-1.15,21,1.15c2.91,1.23,0,6.41,0,6.41Z"
                                            style="opacity: 0.1; transform-origin: 380.177px 194.956px;"
                                            class="animable">
                                        </path>
                                    </g>
                                    <path
                                        d="M371,169.16c-.1.58-.48,1-.86.94s-.61-.58-.52-1.16.48-1,.86-.94S371.06,168.58,371,169.16Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 370.306px 169.05px;"
                                        id="elpi9wfekd2tb" class="animable"></path>
                                    <path d="M370.93,169.45a20.76,20.76,0,0,1-3.57,4.51,3.38,3.38,0,0,0,2.69,1Z"
                                        style="fill: rgb(222, 87, 83); transform-origin: 369.145px 172.211px;"
                                        id="elvokxkh4v9sc" class="animable"></path>
                                    <path
                                        d="M373.34,167.36a.33.33,0,0,1-.31-.18,2.73,2.73,0,0,0-2-1.49.35.35,0,0,1,.06-.69,3.44,3.44,0,0,1,2.55,1.85.35.35,0,0,1-.14.47A.32.32,0,0,1,373.34,167.36Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 372.221px 166.18px;"
                                        id="ellb71l1k67cp" class="animable"></path>
                                    <polygon
                                        points="325.59 399.23 318.37 398.26 318.71 381.28 325.93 382.25 325.59 399.23"
                                        style="fill: rgb(228, 137, 123); transform-origin: 322.15px 390.255px;"
                                        id="elye37uogd5wf" class="animable"></polygon>
                                    <polygon
                                        points="379.49 407.21 372.2 407.21 366.53 390.33 373.81 390.33 379.49 407.21"
                                        style="fill: rgb(228, 137, 123); transform-origin: 373.01px 398.77px;"
                                        id="elrea908ujwjl" class="animable"></polygon>
                                    <path
                                        d="M371.23,406.36h8.89a.65.65,0,0,1,.62.5l1.44,6.48a1.07,1.07,0,0,1-1.07,1.29c-2.86-.05-4.94-.21-8.54-.21-2.22,0-6.78.23-9.84.23s-3.46-3-2.21-3.3c5.62-1.23,7.73-2.92,9.53-4.54A1.77,1.77,0,0,1,371.23,406.36Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 371.03px 410.505px;"
                                        id="el9a47hc5ju3" class="animable"></path>
                                    <path
                                        d="M318.12,396.61l7.89,1.06a.63.63,0,0,1,.54.58l.56,6.61A1.06,1.06,0,0,1,325.9,406c-2.84-.44-6.92-1.16-10.5-1.64-4.18-.57-7-.88-11.87-1.54-3-.4-3.38-3.51-2.1-3.62,5.81-.47,9.59.08,14.87-2.27A3.4,3.4,0,0,1,318.12,396.61Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 313.926px 401.302px;"
                                        id="elc4zuc32pgz" class="animable"></path>
                                    <polygon
                                        points="318.71 381.28 318.53 390.04 325.76 391.01 325.93 382.26 318.71 381.28"
                                        style="fill: rgb(206, 111, 100); transform-origin: 322.23px 386.145px;"
                                        id="ell41121cgshk" class="animable"></polygon>
                                    <polygon
                                        points="373.82 390.34 366.53 390.34 369.46 399.04 376.75 399.04 373.82 390.34"
                                        style="fill: rgb(206, 111, 100); transform-origin: 371.64px 394.69px;"
                                        id="elspepde9scu" class="animable"></polygon>
                                    <path
                                        d="M360,194.91s-11.47,20.65-8.85,62.35l38.61,5.21c1.07-5.89,1.25-35.31,10.74-62.47a100.29,100.29,0,0,0-12.71-3.38,141.7,141.7,0,0,0-16.41-2.22A72.83,72.83,0,0,0,360,194.91Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 375.63px 228.415px;"
                                        id="el1oew67hsyhv" class="animable"></path>
                                    <path
                                        d="M364.44,205.43c-1.6,2.77-3.3,5.45-5,8.17l-5.17,8c-1.72,2.68-3.52,5.32-5.33,8-.9,1.32-1.83,2.63-2.76,3.94l-1.41,2c-.52.71-1.13,1.52-1.71,2.19a56.85,56.85,0,0,1-7.5,7.14c-2.61,2.08-5.26,4-8,5.8a145.21,145.21,0,0,1-16.89,9.62L308,255.54c5-3.67,10-7.54,14.76-11.47,2.37-2,4.69-4,6.86-6.09a52,52,0,0,0,5.82-6.42c.42-.55.74-1,1.12-1.63l1.23-2,2.45-4,4.9-8.07,4.9-8.1c1.67-2.68,3.3-5.4,5-8.05Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 336.22px 230px;"
                                        id="eld0rmxkej5f7" class="animable"></path>
                                    <path
                                        d="M368,203.78c-.93,6.9-13,23.32-13,23.32l-16.81-14.19s8.79-9.83,16-15.44S369,196.2,368,203.78Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 353.14px 211.01px;"
                                        id="elizyaikcryz" class="animable"></path>
                                    <path d="M311.62,253.46l-6.29,2.14,6.3,6.57s3.84-.46,3.49-5.76Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 310.236px 257.815px;"
                                        id="elzebv5d0aulc" class="animable"></path>
                                    <polygon
                                        points="301.16 260.6 308.35 264.13 311.63 262.17 305.33 255.6 301.16 260.6"
                                        style="fill: rgb(228, 137, 123); transform-origin: 306.395px 259.865px;"
                                        id="elr7ewsafu0g" class="animable"></polygon>
                                    <path
                                        d="M390.84,170.3c-1.58,7.06-2.15,11.27-6.33,14.35-6.3,4.63-14.57,0-15.13-7.43-.51-6.65,2.16-17.07,9.6-18.79A9.86,9.86,0,0,1,390.84,170.3Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 380.213px 172.335px;"
                                        id="els314unkbgf" class="animable"></path>
                                    <path
                                        d="M400.61,170.06a3.89,3.89,0,0,0-1.79-2.65c3.42-1.5,1.71-3.24-1.21-5.78h0c-3.77-3.37-5.34-10.19-5.17-11.65-1.19,1.81-.87,4.48.14,6.88a16.56,16.56,0,0,1-3-4.7c-2.92-7.33-9.23-.92-15.32-.71-10.23.35-2.13-5,5.38-4.84-11.19-3.43-22.35.82-20.53,8.3s14.34-2,14.27,4.9c0,1.4,1.53,2.78,3.8,3.87-3.15,6.48,4.53,19.5,9,19.92s12.3-7.36,12.63-14.1A5,5,0,0,1,400.61,170.06Z"
                                        style="fill: rgb(38, 50, 56); transform-origin: 379.814px 164.511px;"
                                        id="elmzy8yw0k84" class="animable"></path>
                                    <path
                                        d="M380.68,171.91a6.92,6.92,0,0,1-3.12,4.22c-2.08,1.22-3.73-.48-3.68-2.77.05-2.05,1.2-5.17,3.53-5.46A3.09,3.09,0,0,1,380.68,171.91Z"
                                        style="fill: rgb(228, 137, 123); transform-origin: 377.352px 172.21px;"
                                        id="eldrldmm48ghf" class="animable"></path>
                                    <path
                                        d="M379.38,397.35H366s-17.62-44.93-19.49-68.24c-.4-5,.4-11.59,1.88-18.68,2.52-12.12,7-25.79,10.6-36,3.23-9,5.82-15.35,5.82-15.35l24.93,3.37c-2.45,18.09-22.23,46.86-22.46,71.6C367.09,356.87,379.38,397.35,379.38,397.35Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 368.074px 328.215px;"
                                        id="elho2wxdyvju" class="animable"></path>
                                    <g id="elfmiqxxse0ig">
                                        <path
                                            d="M379.38,397.35H366s-17.62-44.93-19.49-68.24c-.4-5,.4-11.59,1.88-18.68,2.52-12.12,7-25.79,10.6-36,3.23-9,5.82-15.35,5.82-15.35l24.93,3.37c-2.45,18.09-22.23,46.86-22.46,71.6C367.09,356.87,379.38,397.35,379.38,397.35Z"
                                            style="opacity: 0.1; transform-origin: 368.074px 328.215px;"
                                            class="animable">
                                        </path>
                                    </g>
                                    <path
                                        d="M365.33,280.11c-.87,12.09-10.17,24.95-16.91,30.32,2.52-12.12,7-25.79,10.6-36C360.91,274.2,363.9,277.93,365.33,280.11Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 356.875px 292.425px;"
                                        id="el2slo1xna6do" class="animable"></path>
                                    <g id="el2opjg7mn2zx">
                                        <path
                                            d="M365.33,280.11c-.87,12.09-10.17,24.95-16.91,30.32,2.52-12.12,7-25.79,10.6-36C360.91,274.2,363.9,277.93,365.33,280.11Z"
                                            style="opacity: 0.2; transform-origin: 356.875px 292.425px;"
                                            class="animable">
                                        </path>
                                    </g>
                                    <path
                                        d="M351.15,257.26S316.87,302.91,314.68,325c-2.28,23,1.37,63,1.37,63l12.23,1.65s3.69-37.56,7.28-60c3.9-24.44,41-49.71,43.59-68.63Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 346.54px 323.455px;"
                                        id="el77sizi76rxm" class="animable"></path>
                                    <g id="elkqx54vn4qlg">
                                        <path
                                            d="M351.15,257.26S316.87,302.91,314.68,325c-2.28,23,1.37,63,1.37,63l12.23,1.65s3.69-37.56,7.28-60c3.9-24.44,41-49.71,43.59-68.63Z"
                                            style="opacity: 0.1; transform-origin: 346.54px 323.455px;"
                                            class="animable">
                                        </path>
                                    </g>
                                    <polygon
                                        points="363.67 397.64 381.12 397.64 381.12 392.94 361.62 392.64 363.67 397.64"
                                        style="fill: rgb(96, 165, 250); transform-origin: 371.37px 395.14px;"
                                        id="elz9a80onoagh" class="animable"></polygon>
                                    <g id="el6u0a2eaxwat">
                                        <polygon
                                            points="363.67 397.64 381.12 397.64 381.12 392.94 361.62 392.64 363.67 397.64"
                                            style="fill: rgb(250, 250, 250); opacity: 0.4; transform-origin: 371.37px 395.14px;"
                                            class="animable"></polygon>
                                    </g>
                                    <polygon
                                        points="313.58 387.92 330.57 390.25 331.2 385.55 312.21 382.69 313.58 387.92"
                                        style="fill: rgb(96, 165, 250); transform-origin: 321.705px 386.47px;"
                                        id="elous9tuc8838" class="animable"></polygon>
                                    <g id="el8ib8hq9mu5v">
                                        <polygon
                                            points="313.58 387.92 330.57 390.25 331.2 385.55 312.21 382.69 313.58 387.92"
                                            style="fill: rgb(250, 250, 250); opacity: 0.4; transform-origin: 321.705px 386.47px;"
                                            class="animable"></polygon>
                                    </g>
                                    <path
                                        d="M368.82,407.64a2.19,2.19,0,0,1-1.4-.38,1,1,0,0,1-.36-.91.55.55,0,0,1,.3-.49c.8-.4,3.16,1,3.42,1.2a.18.18,0,0,1,.08.17.16.16,0,0,1-.13.14A8.13,8.13,0,0,1,368.82,407.64Zm-1.08-1.51a.48.48,0,0,0-.22,0s-.1.07-.11.2a.71.71,0,0,0,.23.63,3.54,3.54,0,0,0,2.59.13A7,7,0,0,0,367.74,406.13Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 368.956px 406.717px;"
                                        id="el9eoufn924rn" class="animable"></path>
                                    <path
                                        d="M370.69,407.38l-.08,0c-.76-.41-2.21-2-2.06-2.82a.56.56,0,0,1,.55-.45.9.9,0,0,1,.73.22c.85.69,1,2.79,1,2.88a.15.15,0,0,1-.08.16Zm-1.47-3h-.08c-.22,0-.24.13-.25.17-.09.48.84,1.69,1.59,2.26a4.2,4.2,0,0,0-.86-2.28A.6.6,0,0,0,369.22,404.42Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 369.686px 405.74px;"
                                        id="elh9q8eh6e41f" class="animable"></path>
                                    <path
                                        d="M316.28,397.55c-1.14,0-2.5-.15-3-.76a1,1,0,0,1-.21-.88.6.6,0,0,1,.35-.42c.94-.36,3.64,1.5,3.95,1.71a.18.18,0,0,1,.07.19.17.17,0,0,1-.16.12C317,397.53,316.64,397.55,316.28,397.55Zm-2.58-1.76a.4.4,0,0,0-.19,0,.19.19,0,0,0-.13.16.65.65,0,0,0,.13.58c.39.45,1.58.69,3.2.63A8.33,8.33,0,0,0,313.7,395.79Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 315.244px 396.497px;"
                                        id="eljz5ajfqj4vf" class="animable"></path>
                                    <path
                                        d="M317.24,397.52l-.09,0c-.82-.51-2.33-2.3-2.09-3.1.05-.18.21-.4.65-.4h.05a1.31,1.31,0,0,1,.91.43,4.9,4.9,0,0,1,.74,2.93.16.16,0,0,1-.09.15Zm-1.53-3.18c-.28,0-.31.11-.32.15-.15.48.86,1.86,1.68,2.52a4.08,4.08,0,0,0-.66-2.36.9.9,0,0,0-.66-.31Z"
                                        style="fill: rgb(96, 165, 250); transform-origin: 316.228px 395.775px;"
                                        id="el4ehqggjlw2s" class="animable"></path>
                                </g>
                                <defs>
                                    <filter id="active" height="200%">
                                        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                            radius="2">
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
                                        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                            radius="2">
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
                        </div>
                        <div class="text-slate-400 w-full text-center">
                            you don't have any post yet, <a href="{{ route('posts.new.view') }}"
                                class="text-blue-400 hover:underline">create
                                one</a></div>

                    </div>
            @endif
        </div>
    </div>
</div>
