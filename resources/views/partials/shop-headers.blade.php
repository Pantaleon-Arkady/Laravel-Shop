<div class="bg-black px-10 py-5">
    @auth
        @if ($admin)
            <div class="relative flex items-center">
                <div>
                    <a href="/" class="page-button-hover">Posts</a>
                </div>
            
                <div class="absolute left-1/2 -translate-x-1/2 admin_header_mid">
                    Admin
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