<div class="flex mt-20">
    <div>
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
    </div>
    <div class="display-block">
    <!-- Register Form -->
        @include('partials.auth.forms.register')
    <!-- Login Form -->
        @include('partials.auth.forms.login')
    </div>
</div>