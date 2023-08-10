<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/community.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Create a New News</h2>
        <form action="{{ route('community.store') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group" id="sources-group">
                <label for="sources">Sources (URL and Platform)</label>
                <input type="text" name="sources['source-0'][url]" class="form-control" style="margin-top: 1rem" placeholder="Enter a link">
                <input type="text" name="sources['source-0'][platform]" class="form-control" style="margin-top: 1rem" placeholder="Enter platform name">
            </div>
            <button type="button" id="add-more-btn" class="btn btn-primary">Add More</button>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
    <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        var sourceCounter = 1;

        $("#add-more-btn").click(function() {
            var uniqueId = "source-" + sourceCounter;
            sourceCounter++;
            var clonedInputUrl = $('<input type="text" name="sources[' + uniqueId + '][url]" class="form-control" style="margin-top: 1rem" placeholder="Enter another link">');
            var clonedInputPlatform = $('<input type="text" name="sources[' + uniqueId + '][platform]" class="form-control" style="margin-top: 1rem" placeholder="Enter platform name">');
            $("#sources-group").append(clonedInputUrl);
            $("#sources-group").append(clonedInputPlatform);
        });
    });

    </script>
</body>
</html>
