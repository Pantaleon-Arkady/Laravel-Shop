<div class="text-center space-y-4 flex flex-col items-center">
    <h3 class="text-2xl font-semibold">App Home Page</h3>
    <div>
        <button class="body-buttons" onclick="showAllPosts()">All Posts</button>
        <button class="body-buttons" onclick="showMyPosts()">My Posts</button>
    </div>
    <div class="posts_div" id="allPosts">
        @include('partials.components.all-posts')
    </div>
    <div class="posts_div" id="userPosts">
        @include('partials.components.user-posts')
    </div>
</div>