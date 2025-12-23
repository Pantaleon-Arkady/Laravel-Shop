<div class="bg-black px-10 py-5">
    @auth
        <div class="relative flex items-center">
            <div>
                <h3 class="text-[30px] font-semibold text-white">Shop</h3>
            </div>
        
            <div class="absolute left-1/2 -translate-x-1/2">
                <button id="openModal" class="create-post-btn">
                    Create a Post?
                </button>
            </div>
        
            <div class="ml-auto">
                <a href="/trials" class="underline-hover">
                    Trials?
                </a>
            </div>
        </div>
    @else
        <h3 class="text-[30px] font-semibold text-white">Shop</h3>
    @endauth
</div>

<div
    id="modal"
    class="fixed inset-0 z-50 hidden flex items-center justify-center"
>
    <!-- Backdrop -->
    <div
        id="backdrop"
        class="absolute inset-0 bg-black/50"
    ></div>

    <div class="relative bg-white rounded-lg shadow-lg w-full max-w-md p-6 z-10" id="postForm">
        <div class="flex flex-row justify-between">
            <h3 class="text-xl font-semibold mb-3">Create a New Post?</h3>
            <button
                id="closeModal"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                aria-label="Close"
            >
                ✕
            </button>
        </div>
    
        <form action="/create-post" method="POST" class="space-y-3">
            @csrf
    
            <input type="text" name="title" placeholder="Create a title..."
                class="input-field"/>
    
            <textarea name="content" class="input-field" placeholder="Type in what you want to post..." ></textarea>
    
            <button type="submit"
                    class="btn-secondary">
                Create Post
            </button>
        </form>
    </div>

</div>