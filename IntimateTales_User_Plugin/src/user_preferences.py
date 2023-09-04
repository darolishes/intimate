```python
import json

class UserPreferences:
    def __init__(self):
        self.display_name = ""
        self.profile_picture = ""

    def set_display_name(self, name):
        self.display_name = name
        self.notify_user('displayNameChanged')

    def upload_profile_picture(self, picture):
        self.profile_picture = picture
        self.notify_user('profilePictureUploaded')

    def notify_user(self, message):
        print(f"User notification: {message}")

def load_user_preferences():
    with open('../config/user_preferences.json') as f:
        data = json.load(f)
        user_preferences = UserPreferences()
        user_preferences.set_display_name(data['display_name'])
        user_preferences.upload_profile_picture(data['profile_picture'])
        return user_preferences

def save_user_preferences(user_preferences):
    data = {
        'display_name': user_preferences.display_name,
        'profile_picture': user_preferences.profile_picture
    }
    with open('../config/user_preferences.json', 'w') as f:
        json.dump(data, f)

user_preferences = load_user_preferences()
# Example usage:
# user_preferences.set_display_name("New Name")
# save_user_preferences(user_preferences)
```