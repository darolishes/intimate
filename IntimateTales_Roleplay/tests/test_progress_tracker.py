```python
import unittest
from IntimateTales_Roleplay.src.interactive_tools.progress_tracker import ProgressTracker

class TestProgressTracker(unittest.TestCase):

    def setUp(self):
        self.progress_tracker = ProgressTracker()

    def test_trackProgress(self):
        # Mock data
        story_id = 1
        character_id = 1
        progress_data = {
            "story_id": story_id,
            "character_id": character_id,
            "progress": "Chapter 1 completed"
        }

        # Call the method
        result = self.progress_tracker.trackProgress(story_id, character_id, progress_data)

        # Assert the result
        self.assertEqual(result, True)

    def test_getProgress(self):
        # Mock data
        story_id = 1
        character_id = 1

        # Call the method
        result = self.progress_tracker.getProgress(story_id, character_id)

        # Assert the result
        self.assertIsNotNone(result)
        self.assertEqual(result["story_id"], story_id)
        self.assertEqual(result["character_id"], character_id)

    def test_updateProgress(self):
        # Mock data
        story_id = 1
        character_id = 1
        new_progress_data = {
            "story_id": story_id,
            "character_id": character_id,
            "progress": "Chapter 2 completed"
        }

        # Call the method
        result = self.progress_tracker.updateProgress(story_id, character_id, new_progress_data)

        # Assert the result
        self.assertEqual(result, True)

if __name__ == '__main__':
    unittest.main()
```