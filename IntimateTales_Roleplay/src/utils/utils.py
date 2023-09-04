```python
import json

def validate_data(data, schema):
    """
    Validates the given data against the provided schema.
    """
    try:
        json.loads(json.dumps(data), schema=schema)
        return True
    except json.JSONDecodeError:
        return False

def handle_error(error):
    """
    Handles the given error by logging it.
    """
    print(f"Error: {error}")

def format_data(data):
    """
    Formats the given data into a JSON string.
    """
    return json.dumps(data, indent=4)

def get_element_by_id(id):
    """
    Returns the DOM element with the given ID.
    """
    return document.getElementById(id)

def send_message(name, data):
    """
    Sends a message with the given name and data.
    """
    window.postMessage({
        'name': name,
        'data': data
    }, '*')

def receive_message(event, name, callback):
    """
    Receives a message with the given name and calls the callback function.
    """
    if event.data.name == name:
        callback(event.data.data)
```