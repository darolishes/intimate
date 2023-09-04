```python
from ..utils import constants
from ..utils import utils

class ProgressTracker:
    def __init__(self):
        self.progress_report = []

    def track_progress(self, story_id, character_id, decision_id):
        story_status = utils.get_story_status(story_id)
        character_status = utils.get_character_status(character_id)
        decision_status = utils.get_decision_status(decision_id)

        progress_data = {
            "story_id": story_id,
            "story_status": story_status,
            "character_id": character_id,
            "character_status": character_status,
            "decision_id": decision_id,
            "decision_status": decision_status
        }

        self.progress_report.append(progress_data)

    def get_progress_report(self):
        return self.progress_report

    def clear_progress(self):
        self.progress_report = []
```
