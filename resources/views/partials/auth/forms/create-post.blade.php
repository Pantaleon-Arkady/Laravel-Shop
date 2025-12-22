<div class="form-div" id="postForm">
    <h3 class="text-xl font-semibold mb-3">Create a New Post?</h3>

    <form action="/create-post" method="POST" class="space-y-3">
        @csrf

        <input type="text" name="title" placeholder="Create a title..."
            class="input-field"/>

        <textarea name="content" class="input-field" placeholder="Type in what you want to post..." ></textarea>

        <button type="submit"
                class="btn-secondary">
            Create Post
        </button>
    </form>
</div>