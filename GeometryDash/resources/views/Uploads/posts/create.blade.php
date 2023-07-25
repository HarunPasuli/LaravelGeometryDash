<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('asset/css/posts.css') }}">
</head>
<body>
<div class="container">
    <h2>Create a New Post</h2>
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
</body>
</html>
