```python
import json

class RomanticTendencies:
    def __init__(self):
        self.romantic_tendencies = self.load_romantic_tendencies()

    def load_romantic_tendencies(self):
        with open('../config/romantic_tendencies.json') as f:
            data = json.load(f)
        return data

    def set_romantic_gestures(self, user_id, gestures):
        self.romantic_tendencies[user_id]['gestures'] = gestures
        self.save_romantic_tendencies()

    def set_dialogue_styles(self, user_id, styles):
        self.romantic_tendencies[user_id]['styles'] = styles
        self.save_romantic_tendencies()

    def get_romantic_gestures(self, user_id):
        return self.romantic_tendencies[user_id]['gestures']

    def get_dialogue_styles(self, user_id):
        return self.romantic_tendencies[user_id]['styles']

    def save_romantic_tendencies(self):
        with open('../config/romantic_tendencies.json', 'w') as f:
            json.dump(self.romantic_tendencies, f)
```