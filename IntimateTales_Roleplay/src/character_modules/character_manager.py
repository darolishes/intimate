```python
from .character import Character
from ..utils import utils

class CharacterManager:
    def __init__(self):
        self.characterList = []

    def createCharacter(self, characterData):
        if utils.validateCharacterData(characterData):
            newCharacter = Character(characterData)
            self.characterList.append(newCharacter)
            return newCharacter
        else:
            raise ValueError("Invalid character data")

    def getCharacter(self, characterId):
        for character in self.characterList:
            if character.id == characterId:
                return character
        return None

    def updateCharacter(self, characterId, updatedData):
        character = self.getCharacter(characterId)
        if character:
            if utils.validateCharacterData(updatedData):
                character.update(updatedData)
                return character
            else:
                raise ValueError("Invalid updated data")
        else:
            raise ValueError("Character not found")

    def deleteCharacter(self, characterId):
        character = self.getCharacter(characterId)
        if character:
            self.characterList.remove(character)
            return True
        else:
            return False
```