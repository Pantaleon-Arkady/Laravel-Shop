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