```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IntimateTales - Interaction</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="interactionContainer">
        <h1>Your Interactions</h1>
        <div id="interactionList"></div>
        <form id="interactionForm">
            <input type="hidden" id="interactionId">
            <textarea id="interactionText" placeholder="Describe your interaction..."></textarea>
            <button type="submit">Submit Interaction</button>
        </form>
    </div>
    <script src="{{ asset('js/interaction.js') }}"></script>
</body>
</html>
```