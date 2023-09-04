```python
import json
from ..story_management.story_manager import storyList
from ..character_modules.character_manager import characterList
from ..interactive_tools.progress_tracker import progressReport
from ..utils.constants import SYNC_STATUS

class DataSynchronizer:
    def __init__(self):
        self.sync_status = SYNC_STATUS['NOT_STARTED']

    def synchronize_data(self):
        try:
            self.sync_status = SYNC_STATUS['IN_PROGRESS']
            story_data = json.dumps(storyList, default=lambda o: o.__dict__)
            character_data = json.dumps(characterList, default=lambda o: o.__dict__)
            progress_data = json.dumps(progressReport, default=lambda o: o.__dict__)
            self.sync_status = SYNC_STATUS['COMPLETED']
            return story_data, character_data, progress_data
        except Exception as e:
            self.sync_status = SYNC_STATUS['FAILED']
            print(f"Data synchronization failed: {str(e)}")
            return None

    def get_sync_status(self):
        return self.sync_status
```