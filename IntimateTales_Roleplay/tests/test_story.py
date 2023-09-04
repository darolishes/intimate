```python
import unittest
from IntimateTales_Roleplay.src.story_management.story import Story
from IntimateTales_Roleplay.src.story_management.story_manager import StoryManager
from IntimateTales_Roleplay.src.utils.constants import STORY_STATUS

class TestStory(unittest.TestCase):

    def setUp(self):
        self.story_manager = StoryManager()
        self.story = Story("Test Story", "This is a test story.")

    def test_create_story(self):
        self.story_manager.createStory(self.story)
        self.assertIn(self.story, self.story_manager.storyList)

    def test_update_story_status(self):
        self.story_manager.updateStoryStatus(self.story, STORY_STATUS['IN_PROGRESS'])
        self.assertEqual(self.story.status, STORY_STATUS['IN_PROGRESS'])

    def test_delete_story(self):
        self.story_manager.createStory(self.story)
        self.story_manager.deleteStory(self.story)
        self.assertNotIn(self.story, self.story_manager.storyList)

if __name__ == '__main__':
    unittest.main()
```