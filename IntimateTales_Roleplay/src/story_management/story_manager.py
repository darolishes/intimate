```python
from .story import Story

class StoryManager:
    def __init__(self):
        self.storyList = []

    def createStory(self, title, description, storyline):
        new_story = Story(title, description, storyline)
        self.storyList.append(new_story)
        return new_story

    def getStory(self, title):
        for story in self.storyList:
            if story.title == title:
                return story
        return None

    def updateStory(self, title, new_description=None, new_storyline=None):
        story = self.getStory(title)
        if story:
            if new_description:
                story.description = new_description
            if new_storyline:
                story.storyline = new_storyline
            return True
        return False

    def deleteStory(self, title):
        story = self.getStory(title)
        if story:
            self.storyList.remove(story)
            return True
        return False
```