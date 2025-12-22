<div class="form-container w-100 pin-form">
    <h5 class="text-center mb-3">Verify Your Email</h5>

    <form method="POST" action="/register-pin" id="pinForm">
        @csrf

        <div class="mb-3">
            <input
                type="text"
                inputmode="numeric"
                pattern="\d{6}"
                maxlength="6"
                class="form-control text-center fs-3"
                name="pin"
                placeholder="------"
                required
                autocomplete="off"
            >
            <div class="invalid-feedback"></div>
        </div>

        <button type="submit" class="btn btn-dark w-100">Submit PIN</button>

        <div class="text-center mt-3">
            <a href="http://localhost:8025/" target="_blank" class="text-decoration-none small">
                Open Mail Viewer
            </a>
        </div>
    </form>
</div>