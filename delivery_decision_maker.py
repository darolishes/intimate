```python
import json

def decide_delivery(plugin_data):
    # Load the plugin data
    with open(plugin_data, 'r') as file:
        plugins = json.load(file)

    # Check if all plugins are complete
    all_complete = all(plugin['complete'] for plugin in plugins)

    # If all plugins are complete, deliver as a single package
    if all_complete:
        delivery = 'single'
    else:
        # If not all plugins are complete, deliver individually
        delivery = 'multiple'

    return delivery

# Test the function
print(decide_delivery('plugin_data.json'))
```