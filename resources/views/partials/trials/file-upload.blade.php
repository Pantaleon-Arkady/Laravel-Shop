<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file_upload">
    <button type="submit">Upload File</button>
</form>