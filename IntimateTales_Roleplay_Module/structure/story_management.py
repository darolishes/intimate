```python
from ..features.dynamic_storylines import generateStoryline
from ..tech_stack.acf import ACF
from ..shared_dependencies import UserSchema, StorySchema, userChoices, storyProgress

class StoryManagement:
    def __init__(self):
        self.acf = ACF()
        self.user_schema = UserSchema()
        self.story_schema = StorySchema()

    def create_story(self, user_id):
        user_data = self.user_schema.load(user_id)
        storyline = generateStoryline(user_data)
        story_id = self.acf.create(storyline, self.story_schema)
        return story_id

    def update_story(self, story_id, user_id):
        user_data = self.user_schema.load(user_id)
        user_choices = userChoices[user_id]
        updated_storyline = generateStoryline(user_data, user_choices)
        self.acf.update(story_id, updated_storyline, self.story_schema)

    def get_story_progress(self, story_id):
        story_data = self.acf.load(story_id, self.story_schema)
        progress = storyProgress[story_id]
        return progress, story_data
```