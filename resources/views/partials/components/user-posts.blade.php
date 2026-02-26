
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