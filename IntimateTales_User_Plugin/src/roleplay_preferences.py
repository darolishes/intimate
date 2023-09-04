```python
import json
from acf_integration import fetch_roleplay_preferences

class RoleplayPreferences:
    def __init__(self, user_id):
        self.user_id = user_id
        self.preferences = self.load_preferences()

    def load_preferences(self):
        try:
            with open(f'../config/roleplay_preferences.json', 'r') as file:
                return json.load(file)
        except FileNotFoundError:
            return {}

    def get_preferences(self):
        return self.preferences

    def set_preferences(self, preferences):
        self.preferences = preferences
        self.save_preferences()

    def save_preferences(self):
        with open(f'../config/roleplay_preferences.json', 'w') as file:
            json.dump(self.preferences, file)

    def fetch_preferences_from_acf(self):
        self.preferences = fetch_roleplay_preferences(self.user_id)
        self.save_preferences()

    def update_preference(self, preference_key, preference_value):
        self.preferences[preference_key] = preference_value
        self.save_preferences()

    def remove_preference(self, preference_key):
        if preference_key in self.preferences:
            del self.preferences[preference_key]
            self.save_preferences()
```