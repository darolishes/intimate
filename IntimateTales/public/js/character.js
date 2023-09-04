```javascript
let characterId;

// WebSocket connection
const socket = new WebSocket('ws://localhost:8080');

// Connection opened
socket.addEventListener('open', (event) => {
    socket.send('Hello Server!');
});

// Listen for messages
socket.addEventListener('message', (event) => {
    let data = JSON.parse(event.data);
    if (data.type === 'characterUpdate') {
        updateCharacterView(data.character);
    }
});

// Fetch character on page load
window.onload = function() {
    fetch('/api/character')
        .then(response => response.json())
        .then(data => {
            characterId = data.id;
            updateCharacterView(data);
        });
};

// Update character view
function updateCharacterView(character) {
    document.getElementById('characterName').innerText = character.name;
    document.getElementById('characterDescription').innerText = character.description;
}

// Create character
function createCharacter() {
    let name = document.getElementById('newCharacterName').value;
    let description = document.getElementById('newCharacterDescription').value;

    fetch('/api/character', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name: name, description: description }),
    })
    .then(response => response.json())
    .then(data => {
        characterId = data.id;
        updateCharacterView(data);
    });
}

// Update character
function updateCharacter() {
    let name = document.getElementById('editCharacterName').value;
    let description = document.getElementById('editCharacterDescription').value;

    fetch(`/api/character/${characterId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name: name, description: description }),
    })
    .then(response => response.json())
    .then(data => {
        updateCharacterView(data);
    });
}

// Delete character
function deleteCharacter() {
    fetch(`/api/character/${characterId}`, {
        method: 'DELETE',
    })
    .then(() => {
        document.getElementById('characterName').innerText = '';
        document.getElementById('characterDescription').innerText = '';
    });
}
```