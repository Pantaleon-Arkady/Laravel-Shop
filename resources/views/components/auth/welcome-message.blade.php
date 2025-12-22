<div class="form-container w-100 text-center">
    <h4 class="mb-3">Welcome to Trial App Name</h4>

    @if (session('registered'))
        <div class="alert alert-success py-3">
            <strong>Success!</strong> You are now registered!
        </div>
        @php session()->forget('registered') @endphp
    @else
        <p class="text-muted">Please choose to <strong>Log In</strong> or <strong>Sign Up</strong> to continue.</p>
    @endif
</div>