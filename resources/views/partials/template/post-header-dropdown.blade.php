<div class="mobile_post_header_feature">
    <button id="mobileOpenBtn" class="bg-white p-1 rounded">
        <img class="bg-white" src="{{ asset('statics/feature.svg') }}" alt="Feature">
    </button>
</div>

<div
    id="mobileHeaderModal"
    class="fixed inset-0 z-50 hidden"
>
    <div
        id="backdrop"
        class="absolute inset-0 bg-black/50"
    ></div>

    <div class="flex flex-row justify-between z-51 border-2 border-white text-white">
        <button
            id="mobileCloseBtn"
            class="absolute top-3 right-3 text-white"
            aria-label="Close"
        >
            ✕
        </button>
        PUTANGINA NAMAN
    </div>
</div>
