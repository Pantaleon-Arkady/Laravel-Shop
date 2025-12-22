{{-- <div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
</div> --}}
<div class="form-container w-100">
    <h4 class="mb-4 text-center">Create an Account</h4>

    @if (session('registered'))
        <div class="alert alert-success py-3 mt-3">
            <strong>Success!</strong> You are now registered in Trial App Name.
        </div>
        @php session()->forget('registered') @endphp
    @endif

    <form method="POST" action="/signing-up" id="registerForm" novalidate>
        @csrf

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback"></div>
        </div>

        <button type="submit" class="btn btn-dark w-100 mt-2" id="registerBtn">
            <span id="registerText">Register</span>
            <span id="registerSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button>
    </form>
</div>