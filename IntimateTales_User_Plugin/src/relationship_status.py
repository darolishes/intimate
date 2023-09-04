```python
import json

class RelationshipStatus:
    def __init__(self):
        self.status = None

    def set_relationship_status(self, status):
        self.status = status
        self.save_status()

    def get_relationship_status(self):
        return self.status

    def save_status(self):
        with open('../config/relationship_status.json', 'w') as json_file:
            json.dump(self.status, json_file)

    def load_status(self):
        with open('../config/relationship_status.json', 'r') as json_file:
            self.status = json.load(json_file)

relationship_status = RelationshipStatus()
```