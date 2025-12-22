<div class="form-div" id="loginForm">
    <h3 class="text-xl font-semibold mb-3">Log In</h3>

    <form action="/user-login" method="POST" class="space-y-3">
        @csrf

        <input type="text" name="logName" value="{{ old('logName') }}" placeholder="Username..."
            class="input-field"/>

        <input type="password" name="logPassword" placeholder="Password..."
            class="input-field"/>

        <button type="submit"
                class="btn-secondary">
            Log In
        </button>
    </form>

    @if ($errors->has('logName'))
        <div class="mt-2 text-sm text-red-500">{{ $errors->first('logName') }}</div>
    @endif
</div>