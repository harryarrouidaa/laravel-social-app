<div>
    <div>
        @include('layouts.sidebar')
    </div>
    <div class="w-full h-screen flex justify-center mt-32 text-slate-600">
        <form action="{{ route('post.new.action') }}" method="post" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-5 w-2/4 mx-auto">
                <div class="flex items-center justify-start gap-10  w-full mx-auto">
                    <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found"
                        class="w-[60px] rounded-full w-[60px] h-[60px]">
                    <div class="flex flex-col gap-2">
                        <div class="font-bold">
                            {{ auth()->user()->username }}
                        </div>
                        <div class="text-sm">
                            {{ date('Y-m-d H:i:s') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <textarea name="content" class="w-full h-[200px] textarea textarea-bordered p-5" placeholder="What are you thinking?"></textarea>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <input type="file" id="file-upload" name="image" class="hidden" />
                        <label for="file-upload" class="cursor-pointer flex items-center space-x-2">
                            <img src="{{ asset('/post/add-item2.svg') }}" alt="not found" class="w-[20px]">
                            <span class="text-slate-600">Upload Image</span>
                        </label>
                    </div>
                    <div class="flex gap-1 justify-center items-center">
                        <img src="{{asset('post/create-new.svg')}}" alt="not found" class="w-[20px]">
                        <button type="submit" class="text-slate-600">CREATE</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
