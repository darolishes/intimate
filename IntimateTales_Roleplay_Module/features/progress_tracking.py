```python
from schemas import SessionSchema

class ProgressTracker:
    def __init__(self):
        self.storyProgress = {}
        self.sessionData = {}

    def trackProgress(self, userChoices, characterAttributes):
        self.storyProgress = userChoices
        self.sessionData = characterAttributes

    def displayProgress(self):
        print("Story Progress: ", self.storyProgress)
        print("Session Data: ", self.sessionData)

    def saveProgress(self):
        SessionSchema.save(self.sessionData)

    def loadProgress(self, sessionID):
        self.sessionData = SessionSchema.load(sessionID)
        self.storyProgress = self.sessionData['storyProgress']

progressTracker = ProgressTracker()
```