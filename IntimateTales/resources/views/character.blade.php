```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Creation - IntimateTales</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="characterCreation">
        <h1>Create Your Character</h1>
        <form id="characterForm">
            <label for="characterName">Character Name</label>
            <input type="text" id="characterName" name="characterName" required>

            <label for="characterBio">Character Bio</label>
            <textarea id="characterBio" name="characterBio" required></textarea>

            <button type="submit">Create Character</button>
        </form>
    </div>

    <div id="characterList">
        <h1>Your Characters</h1>
        <div id="characters"></div>
    </div>

    <script src="{{ asset('js/character.js') }}"></script>
</body>
</html>
```