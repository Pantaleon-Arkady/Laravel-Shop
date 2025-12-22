<div class="form-container w-100">
    <h4 class="mb-4 text-center">Log In</h4>

    <form method="POST" action="/logging-in" id="logInForm" novalidate>
        <div class="mb-3">
            <label for="namemail" class="form-label">Username or Email</label>
            <input type="text" class="form-control" id="namemail" name="namemail" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback"></div>
        </div>

        <button type="submit" class="btn btn-dark w-100 mt-2" id="logInBtn">
            <span id="logInText">Log In</span>
            <span id="logInSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
        </button>
    </form>
</div>