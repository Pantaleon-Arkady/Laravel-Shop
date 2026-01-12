<div class="w-full bg-gray-200">
    @if ($admin)
        <div class="admin_shop_main flex flex-row">
            <div class="shop_left">left</div>
            <div class="shop_right p-5">
                <div class="shop_right_content w-full bg-white flex flex-wrap gap-6 justify-start">
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                    <div class="product_card"></div>
                </div>
            </div>
        </div>
    @else
        <div>Shop for user</div>
    @endif
</div>