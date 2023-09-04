```python
from src.utils.constants import CHARACTER_TYPES
from src.utils.utils import validate_data

class Character:
    def __init__(self, character_id, character_type, appearance, traits, backstory):
        self.character_id = character_id
        self.character_type = character_type
        self.appearance = appearance
        self.traits = traits
        self.backstory = backstory

    def create_character(self, character_data):
        if validate_data(character_data):
            self.character_id = character_data['character_id']
            self.character_type = character_data['character_type']
            self.appearance = character_data['appearance']
            self.traits = character_data['traits']
            self.backstory = character_data['backstory']
            return True
        return False

    def update_character(self, character_data):
        if validate_data(character_data):
            self.character_id = character_data.get('character_id', self.character_id)
            self.character_type = character_data.get('character_type', self.character_type)
            self.appearance = character_data.get('appearance', self.appearance)
            self.traits = character_data.get('traits', self.traits)
            self.backstory = character_data.get('backstory', self.backstory)
            return True
        return False

    def get_character(self):
        return {
            'character_id': self.character_id,
            'character_type': self.character_type,
            'appearance': self.appearance,
            'traits': self.traits,
            'backstory': self.backstory
        }
```