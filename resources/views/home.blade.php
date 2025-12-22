<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center">

    @auth
        <div class="text-center space-y-4">
            <h3 class="text-2xl font-semibold">CRUD Home page</h3>
            <div class="form-div" id="postForm">
                <h3 class="text-xl font-semibold mb-3">Create a New Post?</h3>
    
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
            <div>
                <button class="posts-btn" onclick="showAllPosts()">All Posts</button>
                <button class="posts-btn" onclick="showMyPosts()">My Posts</button>
            </div>
            <div class="form-div" id="allPosts">
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
            <div class="form-div" id="userPosts">
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
            <a href="/user-logout"
               class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                Log out
            </a>
        </div>
    @else

        <!-- Toggle Buttons -->
        <div class="border border-gray-400 p-4 rounded-md">
            <h3 class="text-[30px] font-semibold">First Laravel App</h3>
            <div class="flex gap-4 justify-center mb-6 mt-3">
                <button onclick="showRegister()"
                    class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
                    Register
                </button>
                <button onclick="showLogin()"
                    class="px-4 py-2 bg-gray-300 text-gray-900 rounded hover:bg-gray-400 transition">
                    Log in
                </button>
            </div>
        </div>

        <!-- Register Form -->
        <div class="form-div" id="registerForm">
            <h3 class="text-xl font-semibold mb-3">Register</h3>
            <form action="/user-register" method="POST" class="space-y-3">
                @csrf
                <input type="text" name="name" placeholder="Enter a username..."
                       class="input-field"/>

                <input type="email" name="email" placeholder="Please enter your email..."
                       class="input-field"/>

                <input type="password" name="password" placeholder="Create a password..."
                       class="input-field"/>

                <button type="submit"
                        class="btn-secondary">
                    Register
                </button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-div" id="loginForm">
            <h3 class="text-xl font-semibold mb-3">Log In</h3>

            <form action="/user-login" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="logName" value="{{ old('logName') }}" placeholder="Username..."
                       class="input-field"/>

                <input type="password" name="logPassword" placeholder="Password..."
                       class="input-field"/>

                <button type="submit"
                        class="btn-secondary">
                    Log In
                </button>
            </form>

            @if ($errors->has('logName'))
                <div class="mt-2 text-sm text-red-500">{{ $errors->first('logName') }}</div>
            @endif
        </div>

    @endauth

</body>
</html>