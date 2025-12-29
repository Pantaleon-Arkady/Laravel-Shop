<div class="bg-black px-10 py-5">
    @auth
        <div class="relative flex items-center">
            <div>
                <a href="/" class="page-button-hover">Posts</a>
            </div>
        
            <div class="absolute left-1/2 -translate-x-1/2">
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