```python
import unittest
from src.character_modules.character import Character
from src.character_modules.character_manager import CharacterManager

class TestCharacter(unittest.TestCase):

    def setUp(self):
        self.character_manager = CharacterManager()
        self.character = Character("John Doe", "Warrior", "A brave warrior from the north")

    def test_create_character(self):
        self.character_manager.createCharacter(self.character)
        self.assertIn(self.character, self.character_manager.characterList)

    def test_update_character(self):
        self.character_manager.createCharacter(self.character)
        updated_character = Character("John Doe", "Mage", "A wise mage from the north")
        self.character_manager.updateCharacter(self.character, updated_character)
        self.assertIn(updated_character, self.character_manager.characterList)
        self.assertNotIn(self.character, self.character_manager.characterList)

    def test_delete_character(self):
        self.character_manager.createCharacter(self.character)
        self.character_manager.deleteCharacter(self.character)
        self.assertNotIn(self.character, self.character_manager.characterList)

if __name__ == '__main__':
    unittest.main()
```