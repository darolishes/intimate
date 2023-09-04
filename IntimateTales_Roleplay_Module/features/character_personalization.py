```python
from schemas import CharacterSchema

characterAttributes = {}

def customizeCharacter():
    global characterAttributes
    characterAttributes = CharacterSchema()

    print("Welcome to Character Personalization!")
    characterAttributes.name = input("Enter your character's name: ")
    characterAttributes.appearance = input("Describe your character's appearance: ")
    characterAttributes.traits = input("List your character's traits: ")
    characterAttributes.backstory = input("Write your character's backstory: ")

    print("Character Personalization Complete!")
    print("Character Name: ", characterAttributes.name)
    print("Character Appearance: ", characterAttributes.appearance)
    print("Character Traits: ", characterAttributes.traits)
    print("Character Backstory: ", characterAttributes.backstory)

    return characterAttributes
```