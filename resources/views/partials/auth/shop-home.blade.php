<div class="w-full bg-gray-200">
    @if ($admin)
        <div class="admin_shop_main flex flex-row">
            <div class="shop_left">left</div>
            <div class="shop_right p-5">
                <div class="shop_right_content w-full bg-white flex flex-wrap justify-around p-7">
                    @foreach ($products as $product)
                        <div class="product_card">

                            <img
                                src="{{ asset('storage/' . $product->thumbnail) }}"
                                alt="{{ $product->name }}"
                                class="w-full h-48 object-cover rounded"
                            >

                            <div class="p-3">
                                <h3 class="font-semibold text-lg">
                                    {{ $product->name }}
                                </h3>
                
                                <p class="text-sm text-gray-600 line-clamp-2">
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
                        </div>
                    @endforeach
                </div>                
            </div>
        </div>
    @else
        <div>Shop for user</div>
    @endif
</div>