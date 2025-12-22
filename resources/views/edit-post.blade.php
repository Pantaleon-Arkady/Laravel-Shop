<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center">
    <div class="form-div">
        <h1>Editing post</h1>
        <form class="space-y-3" action="/update-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')

            <input class="input-field" type="text" name="title" value="{{$post->title}}" />

            <textarea class="input-field" name="content">{{$post->content}}</textarea>

            <button class="posts-btn" type="submit">Update Post</button>
        </form>
    </div>
</body>
</html>