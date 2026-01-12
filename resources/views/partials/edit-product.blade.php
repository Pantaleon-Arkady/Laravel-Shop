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
        <h1>Editing Product</h1>
        <form class="space-y-3" action="/update-product/{{$product->id}}" method="POST">
            @csrf
            @method('PUT')

            <input class="input-field" type="text" name="name" value="{{$product->name}}" />

            <textarea class="input-field" name="description">{{$product->description}}</textarea>

            <button class="posts-btn" type="submit">Update Product</button>
        </form>
    </div>
</body>
</html>