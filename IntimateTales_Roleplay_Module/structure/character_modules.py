```python
class Character:
    def __init__(self, characterAttributes):
        self.characterAttributes = characterAttributes

    def customizeCharacter(self, newAttributes):
        self.characterAttributes.update(newAttributes)
        return self.characterAttributes

class CharacterModule:
    def __init__(self, UserSchema, CharacterSchema):
        self.users = {}
        self.UserSchema = UserSchema
        self.CharacterSchema = CharacterSchema

    def createCharacter(self, userId, characterAttributes):
        if userId not in self.users:
            self.users[userId] = Character(characterAttributes)
        else:
            raise Exception("Character already exists for this user")

    def getCharacter(self, userId):
        if userId in self.users:
            return self.users[userId].characterAttributes
        else:
            raise Exception("No character found for this user")

    def updateCharacter(self, userId, newAttributes):
        if userId in self.users:
            return self.users[userId].customizeCharacter(newAttributes)
        else:
            raise Exception("No character found for this user")
```