```python
import json

class LikesDislikes:
    def __init__(self):
        self.likes_dislikes = self.load_likes_dislikes()

    def load_likes_dislikes(self):
        with open('../config/likes_dislikes.json') as f:
            return json.load(f)

    def set_likes_dislikes(self, user_id, likes_dislikes):
        self.likes_dislikes[user_id] = likes_dislikes
        self.save_likes_dislikes()

    def get_likes_dislikes(self, user_id):
        return self.likes_dislikes.get(user_id, {})

    def save_likes_dislikes(self):
        with open('../config/likes_dislikes.json', 'w') as f:
            json.dump(self.likes_dislikes, f)

    def delete_likes_dislikes(self, user_id):
        if user_id in self.likes_dislikes:
            del self.likes_dislikes[user_id]
            self.save_likes_dislikes()
```