<div>
    <div>
        @include('layouts.sidebar')
    </div>
    <div class="w-full h-screen flex justify-center mt-32">
        <form action="{{ route('post.new.action') }}" method="post" class="w-full" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-5 w-2/4 mx-auto">
                <div class="flex items-center justify-start gap-10  w-full mx-auto">
                    <img src="{{ Storage::url(auth()->user()->profile->path) }}" alt="not found"
                        class="w-[60px] rounded-full">
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
                    <textarea name="content" class="w-full h-[200px] textarea textarea-bordered p-5" placeholder="What are you thinking?"></textarea>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <input type="file" id="file-upload" name="image" class="hidden" />
                        <label for="file-upload" class="cursor-pointer flex items-center space-x-2">
                            <img src="{{asset('/post/add-item2.svg')}}" alt="not found" class="w-[20px]">
                            <span class="text-slate-600">Upload Image</span>
                        </label>   
                    </div>
                    <button type="submit" class="btn btn-primary text-white">CREATE</button>
                </div>
            </div>
           
        </form>
    </div>
</div>
