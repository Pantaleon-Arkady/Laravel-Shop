<div class="text-center space-y-4 flex flex-col items-center">
    <h3 class="text-2xl font-semibold">App Home Page</h3>
    <div>
        <button class="body-buttons" onclick="showAllPosts()">All Posts</button>
        <button class="body-buttons" onclick="showMyPosts()">My Posts</button>
    </div>
    <div class="posts_div" id="allPosts">
        <h3 class="text-2xl font-semibold">All Posts</h3>
        @foreach ($allPosts as $post)
            <div class="border border-gray-400 p-4 mt-3">
                <div class="flex flex-row justify-center">
                    <h4 class="text-l font-semibold mb-2">{{$post['title']}}&nbsp;</h4><p>by {{$post->user->name}}</p>
                </div>
                <p>~ {{$post['content']}}</p>
                @if ($post->user_id == $userId)
                    <div class="flex flex-row justify-around w-full">
                        <a class="posts-btn" href="/edit-post/{{$post->id}}">Edit</a>
                        <form action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="posts-btn" type="submit">Delete</button>
                        </form>
                    </div> 
                @endif
            </div>
        @endforeach
    </div>
    <div class="posts_div" id="userPosts">
        <h3 class="text-2xl font-semibold">User Posts</h3>
        @foreach ($userPosts as $post)
            <div class="border border-gray-400 p-4 mt-3">
                <h4 class="text-l font-semibold mb-2">{{$post['title']}}</h4>
                <p>~ {{$post['content']}}</p>
                <div class="flex flex-row justify-around w-full">
                    <a class="posts-btn" href="/edit-post/{{$post->id}}">Edit</a>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="posts-btn" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>