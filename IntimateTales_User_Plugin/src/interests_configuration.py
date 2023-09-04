```python
import json
from acf_integration import fetch_preferences

class InterestsConfiguration:
    def __init__(self, user_id):
        self.user_id = user_id
        self.interests = self.load_interests()

    def load_interests(self):
        try:
            with open(f'../config/interests_configuration.json', 'r') as file:
                data = json.load(file)
                return data.get(str(self.user_id), {})
        except FileNotFoundError:
            return {}

    def update_interests(self, genres=None, themes=None, moods=None):
        if genres:
            self.interests['genres'] = genres
        if themes:
            self.interests['themes'] = themes
        if moods:
            self.interests['moods'] = moods
        self.save_interests()

    def save_interests(self):
        try:
            with open(f'../config/interests_configuration.json', 'w') as file:
                data = json.load(file)
                data[str(self.user_id)] = self.interests
                json.dump(data, file)
        except FileNotFoundError:
            pass

    def fetch_interests_options(self):
        return fetch_preferences('interests')

    def display_interests(self):
        return self.interests
```