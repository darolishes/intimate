```python
import json

def check_completeness(plugin_data):
    # Check if all necessary fields are present in the plugin data
    necessary_fields = ["name", "version", "author", "description"]
    for plugin in plugin_data:
        for field in necessary_fields:
            if field not in plugin:
                return False
    return True

def load_plugin_data():
    with open('plugin_data.json') as json_file:
        data = json.load(json_file)
        return data

def plugin_checker():
    plugin_data = load_plugin_data()
    if check_completeness(plugin_data):
        print("All plugins are complete.")
    else:
        print("Some plugins are incomplete.")

plugin_checker()
```