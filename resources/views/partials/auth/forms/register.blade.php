<div class="form-div" id="registerForm">
    <h3 class="text-xl font-semibold mb-3">Register</h3>
    <form action="/user-register" method="POST" class="space-y-3">
        @csrf
        <input type="text" name="name" placeholder="Enter a username..."
            class="input-field"/>

        <input type="email" name="email" placeholder="Please enter your email..."
            class="input-field"/>

        <input type="password" name="password" placeholder="Create a password..."
            class="input-field"/>

        <button type="submit"
                class="btn-secondary">
            Register
        </button>
    </form>
</div>