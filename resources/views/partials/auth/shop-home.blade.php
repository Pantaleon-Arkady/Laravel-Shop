<div class="w-full bg-gray-200">
    @if ($admin)
        <div class="admin_shop_main flex flex-row">
            <div class="shop_left">left</div>
            <div class="shop_right p-5">
                <div class="shop_right_content w-full bg-white flex flex-wrap justify-center gap-8 p-7">
                    @foreach ($products as $product)
                        <a href="/edit-product/{{$product->id}}" class="product_card ">

                            <img
                                src="{{ asset('storage/' . $product->thumbnail) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-48 object-cover transition-all duration-300"
                            />

                            <div class="p-3">
                                <h3 class="font-semibold text-lg">
                                    {{ $product->name }}
                                </h3>
                
                                <p class="text-sm line-clamp-1">
                                    {{ $product->description }}
                                </p>
                
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="font-bold">
                                        ₱{{ number_format($product->price, 2) }}
                                    </span>
                
                                    @if ($product->stock > 0)
                                        <span class="text-green-600 text-sm">In stock</span>
                                    @else
                                        <span class="text-red-600 text-sm">Out of stock</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col w-full">
            <div class="w-full user_shop_top">

            </div>
            <div class="w-full bg-gray-300 flex flex-wrap justify-center gap-8 p-7">
                @foreach ($products as $product)
                    <a href="/view-product/{{$product->id}}" class="user_product_card">

                        <img
                            src="{{ asset('storage/' . $product->thumbnail) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-64 object-cover transition-all duration-300"
                        />
                    
                        <div class="p-4 flex flex-col justify-between h-full">
                            <div>
                                <h3 class="font-semibold text-lg mb-1">
                                    {{ $product->name }}
                                </h3>
                    
                                <p class="text-sm line-clamp-2 text-gray-300 group-hover:text-gray-700">
                                    {{ $product->description }}
                                </p>
                            </div>
                    
                            <div class="mt-4 flex justify-between items-center">
                                <span class="font-bold">
                                    ₱{{ number_format($product->price, 2) }}
                                </span>
                    
                                @if ($product->stock > 0)
                                    <span class="text-green-500 text-sm">In stock</span>
                                @else
                                    <span class="text-red-500 text-sm">Out of stock</span>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>