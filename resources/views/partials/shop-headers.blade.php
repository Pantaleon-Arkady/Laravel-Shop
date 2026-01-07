<div class="bg-black px-10 py-5">
    @auth
        @if ($admin)
            <div class="relative flex items-center">
                <div>
                    <a href="/" class="page-button-hover">Posts</a>
                </div>
            
                <div class="absolute left-1/2 -translate-x-1/2 admin_header_mid">
                    <button id="openModal" class="header-buttons">
                        Add a new product?
                    </button>
                </div>
            
                <div class="ml-auto">
                    <a href="/trials" class="header-buttons mr-2">
                        Trials?
                    </a>
                    <a href="/user-logout" class="header-buttons">
                        Log out
                    </a>
                </div>
            </div>
        @else
            <div class="relative flex items-center">
                <div>
                    <a href="/" class="page-button-hover">Posts</a>
                </div>
            
                <div class="absolute left-1/2 -translate-x-1/2">
                </div>
            
                <div class="ml-auto">
                    <a href="/user-logout" class="header-buttons">
                        Log out
                    </a>
                </div>
            </div>
        @endif
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

    <!-- Form Div -->
    <div class="relative bg-white rounded-lg shadow-lg w-full max-w-md p-6 z-10" id="postForm">
        <div class="flex flex-row justify-between">
            <h3 class="text-xl font-semibold mb-3">Add a New Product</h3>
            <button
                id="closeModal"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
                aria-label="Close"
            >
                ✕
            </button>
        </div>
    
        <form action="/create-product" method="POST" class="space-y-3" enctype="multipart/form-data">
            @csrf
    
            <input type="text" name="name" placeholder="Product Name..."
                class="input-field"/>
    
            <textarea name="description" class="input-field" placeholder="Product Description" ></textarea>

            <div class="flex flex-col gap-2">
                <span class="text-sm font-medium">Main Product Picture:</span>
            
                <label
                    for="thumbnail"
                    class="w-24 h-24 border-2 border-black flex items-center justify-center cursor-pointer rounded-2xl
                           hover:bg-gray-200 transition"
                >
                    <span class="text-5xl font-bold text-black">+</span>
                </label>
            
                <input
                    type="file"
                    id="thumbnail"
                    name="thumbnail"
                    class="hidden"
                />
            </div>

            <div class="flex flex-col gap-2">
                <span class="text-sm font-medium">Add Proudct Pictures:</span>
            
                <label
                    for="images"
                    class="w-24 h-24 border-2 border-black flex items-center justify-center cursor-pointer rounded-2xl
                           hover:bg-gray-200 transition"
                >
                    <span class="text-5xl font-bold text-black">+</span>
                </label>
            
                <input
                    type="file"
                    id="images"
                    name="images"
                    class="hidden"
                    multiple
                />
            </div>
            

            <div class="relative inline-flex items-center">
                <!-- Decrement Button -->
                <button type="button"
                        onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.dispatchEvent(new Event('input'))"
                        class="left-number-input-toggle">
                    −
                </button>
        
                <!-- Number Input -->
                <input type="number"
                        name="stock"
                        value="1"
                        min="0"
                        class="bg-white text-black text-center font-medium text-base border border-gray-800 h-10 w-20 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                        aria-label="Quantity">
        
                <!-- Increment Button -->
                <button type="button"
                        onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.dispatchEvent(new Event('input'))"
                        class="right-number-input-toggle">
                    +
                </button>
            </div>

        </br>
    
            <button type="submit"
                    class="body-buttons">
                Create Post
            </button>
        </form>
    </div>

</div>