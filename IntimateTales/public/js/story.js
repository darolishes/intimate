```javascript
let socket = io.connect('http://localhost:3000');

// Listen for storyUpdate event
socket.on('storyUpdate', function (data) {
    updateStoryView(data.story);
});

// Function to create a new story
function createStory(storyData) {
    fetch('/api/stories', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(storyData),
    })
    .then(response => response.json())
    .then(data => {
        socket.emit('storyUpdate', { story: data });
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

// Function to update a story
function updateStory(storyId, storyData) {
    fetch(`/api/stories/${storyId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(storyData),
    })
    .then(response => response.json())
    .then(data => {
        socket.emit('storyUpdate', { story: data });
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

// Function to delete a story
function deleteStory(storyId) {
    fetch(`/api/stories/${storyId}`, {
        method: 'DELETE',
    })
    .then(() => {
        socket.emit('storyUpdate', { storyId: storyId });
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

// Function to update the story view
function updateStoryView(story) {
    let storyElement = document.getElementById(`story${story.id}`);
    if (storyElement) {
        // Update existing story element
        storyElement.textContent = story.content;
    } else {
        // Create new story element
        storyElement = document.createElement('div');
        storyElement.id = `story${story.id}`;
        storyElement.textContent = story.content;
        document.getElementById('stories').appendChild(storyElement);
    }
}
```