```python
import requests
from ..utils.constants import PLUGIN_STATUS
from ..utils.utils import validate_data

class CorePlugin:
    def __init__(self):
        self.status = PLUGIN_STATUS['NOT_CONNECTED']
        self.data = None

    def connect_to_plugin(self, plugin_url):
        try:
            response = requests.get(plugin_url)
            response.raise_for_status()
            self.status = PLUGIN_STATUS['CONNECTED']
            self.data = response.json()
            return True
        except Exception as e:
            self.status = PLUGIN_STATUS['ERROR']
            print(f"Error connecting to Core Plugin: {e}")
            return False

    def get_plugin_data(self):
        if self.status == PLUGIN_STATUS['CONNECTED'] and self.data:
            return self.data
        else:
            print("Error: Not connected to Core Plugin or no data available.")
            return None

    def update_plugin_data(self, new_data):
        if validate_data(new_data):
            self.data = new_data
            return True
        else:
            print("Error: Invalid data.")
            return False
```