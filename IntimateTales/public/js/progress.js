```javascript
let socket = io.connect('http://localhost:3000');

// Listen for progressUpdate event
socket.on('progressUpdate', function (data) {
    let progress = JSON.parse(data);
    document.getElementById('progressId').innerHTML = progress.description;
});

// Function to create progress
function createProgress() {
    let progressDescription = document.getElementById('progressDescription').value;

    fetch('/api/progress', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ description: progressDescription }),
    })
    .then(response => response.json())
    .then(data => {
        socket.emit('progressUpdate', JSON.stringify(data));
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

// Function to update progress
function updateProgress() {
    let progressId = document.getElementById('progressId').value;
    let progressDescription = document.getElementById('progressDescription').value;

    fetch(`/api/progress/${progressId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ description: progressDescription }),
    })
    .then(response => response.json())
    .then(data => {
        socket.emit('progressUpdate', JSON.stringify(data));
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

// Function to delete progress
function deleteProgress() {
    let progressId = document.getElementById('progressId').value;

    fetch(`/api/progress/${progressId}`, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
        socket.emit('progressUpdate', JSON.stringify(data));
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
```