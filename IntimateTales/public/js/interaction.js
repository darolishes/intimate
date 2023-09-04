```javascript
let socket = new WebSocket("ws://localhost:8080");

socket.onopen = function(e) {
  console.log("[open] Connection established");
};

socket.onmessage = function(event) {
  let data = JSON.parse(event.data);
  if(data.type === 'interactionUpdate') {
    updateInteraction(data.interaction);
  }
};

socket.onerror = function(error) {
  console.log(`[error] ${error.message}`);
};

function createInteraction(interaction) {
  fetch('/api/interactions', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(interaction),
  })
  .then(response => response.json())
  .then(data => {
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

function updateInteraction(interaction) {
  fetch(`/api/interactions/${interaction.id}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(interaction),
  })
  .then(response => response.json())
  .then(data => {
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}

function deleteInteraction(id) {
  fetch(`/api/interactions/${id}`, {
    method: 'DELETE',
  })
  .then(response => response.json())
  .then(data => {
    console.log('Success:', data);
  })
  .catch((error) => {
    console.error('Error:', error);
  });
}
```