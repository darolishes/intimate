```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntimateTales - Story</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="storyContainer">
        <h1>Your Story</h1>
        <div id="storyContent">
            <!-- Story content will be loaded here dynamically -->
        </div>
        <button id="storyUpdate">Update Story</button>
        <button id="storyDelete">Delete Story</button>
    </div>

    <script src="{{ asset('js/story.js') }}"></script>
</body>
</html>
```