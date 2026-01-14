<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center bg-black">
    <div class="edit-form-div flex flex-col p-4 bg-white">
        <div class="flex flex-row justify-between">
            <h1>Editing Product</h1>
            <form action="{{ route('products.delete', $product) }}" method="POST">
                @csrf
                @method('DELETE')
            
                <button
                    type="submit"
                    class="border border-red-600 rounded px-4 py-2 mb-3 text-white bg-red-600 hover:text-red-600 hover:bg-white hover:border-2"
                    onclick="return confirm('Are you sure you want to delete this product?')"
                >
                    Delete Product?
                </button>
            </form>
        </div>
        <div class="border-2 border-black p-4 flex flex-row">
            <form action="/update-product/{{$product->id}}"
                    method="POST"
                    class="space-y-3 border border-black p-3 edit-data-form">
            
                @csrf
                @method('PUT')

                <input
                    type="text"
                    name="name"
                    value="{{$product->name}}"
                    placeholder="Product Name..."
                    class="input-field"
                />

                <textarea
                    name="description"
                    class="input-field"
                    placeholder="Product Description"
                >{{$product->description}}</textarea>

                <div class="flex flex-col gap-1">
                    <span>Price:</span>
                    <input
                        type="number"
                        name="price"
                        step="0.01"
                        value="{{$product->price}}"
                        class="input-field"
                    />
                </div>

                <div class="relative inline-flex items-center">

                    <button type="button"
                        onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.dispatchEvent(new Event('input'))"
                        class="left-number-input-toggle">
                        −
                    </button>

                    <input
                        type="number"
                        name="stock"
                        value="{{$product->stock}}"
                        min="0"
                        class="bg-white text-black text-center font-medium text-base border border-gray-800 h-10 w-20
                                focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"
                    />

                    <button type="button"
                        onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.dispatchEvent(new Event('input'))"
                        class="right-number-input-toggle">
                        +
                    </button>
                </div>
            
                <br>
            
                <button type="submit" class="body-buttons">
                    Update Product
                </button>
            </form>
            <form action="/update-product-images/{{$product->id}}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-4 border border-black p-3 edit-images-form">
            
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-2">
                    <span class="text-sm font-medium">Main Product Picture:</span>
            
                    <label
                        for="thumbnail"
                        class="w-24 h-24 border-2 border-black flex items-center justify-center
                            cursor-pointer rounded-2xl hover:bg-gray-200 transition overflow-hidden"
                    >
                        @if ($product->thumbnail)
                            <img
                                src="{{ asset('storage/' . $product->thumbnail) }}"
                                class="w-full h-full object-cover"
                            />
                        @else
                            <span class="text-5xl font-bold text-black">+</span>
                        @endif
                    </label>
            
                    <input
                        type="file"
                        id="thumbnail"
                        name="thumbnail"
                        accept="image/*"
                        class="hidden"
                    />
                </div>

                <div class="flex flex-col gap-2">
                    <span class="text-sm font-medium">Add Product Pictures:</span>
            
                    <label
                        for="images"
                        class="w-24 h-24 border-2 border-black flex items-center justify-center
                                cursor-pointer rounded-2xl hover:bg-gray-200 transition"
                    >
                        <span class="text-5xl font-bold text-black">+</span>
                    </label>
            
                    <input
                        type="file"
                        id="images"
                        name="images[]"
                        accept="image/*"
                        multiple
                        class="hidden"
                    />

                    <div id="imagesPreview" class="flex gap-2 flex-wrap mt-2">
                        @if (!empty($product->images))
                            @foreach ($product->images as $image)
                                <div class="relative w-24 h-24">
                                    <img
                                        src="{{ asset('storage/' . $image) }}"
                                        class="w-full h-full object-cover rounded-xl border"
                                    />
                    
                                    {{-- Optional delete button --}}
                                    <button
                                        type="button"
                                        class="absolute top-1 right-1 bg-white text-red-600 rounded-full w-6 h-6 text-sm flex items-center justify-center shadow delete_image hover:border-2 hover:border-red-600"
                                        data-image="{{ $image }}"
                                    >
                                        ✕
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            
                <button type="submit" class="body-buttons">
                    Update Images
                </button>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener('click', function (e) {
        if (!e.target.matches('[data-image]')) return;
    
        if (!confirm('Delete this image?')) return;
    
        const imagePath = e.target.dataset.image;
        const productId = "{{ $product->id }}";
    
        fetch(`/delete-product-image/${productId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ image: imagePath }),
        })
        .then(res => res.ok ? res.json() : Promise.reject())
        .then(() => {
            e.target.closest('.relative').remove();
        })
        .catch(() => {
            alert('Failed to delete image');
        });
    });
</script>
    
</html>