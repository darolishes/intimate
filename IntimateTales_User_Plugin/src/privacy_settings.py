```python
import json

class PrivacySettings:
    def __init__(self):
        self.privacy_settings = self.load_privacy_settings()

    def load_privacy_settings(self):
        with open('../config/privacy_settings.json') as json_file:
            return json.load(json_file)

    def get_privacy_settings(self, user_id):
        return self.privacy_settings.get(user_id, None)

    def set_privacy_settings(self, user_id, settings):
        self.privacy_settings[user_id] = settings
        self.save_privacy_settings()

    def save_privacy_settings(self):
        with open('../config/privacy_settings.json', 'w') as json_file:
            json.dump(self.privacy_settings, json_file)

    def delete_privacy_settings(self, user_id):
        if user_id in self.privacy_settings:
            del self.privacy_settings[user_id]
            self.save_privacy_settings()

    def update_privacy_settings(self, user_id, new_settings):
        if user_id in self.privacy_settings:
            self.privacy_settings[user_id].update(new_settings)
            self.save_privacy_settings()
```