```python
class Story:
    def __init__(self, title, description, storyline, status):
        self.title = title
        self.description = description
        self.storyline = storyline
        self.status = status

    def get_title(self):
        return self.title

    def set_title(self, title):
        self.title = title

    def get_description(self):
        return self.description

    def set_description(self, description):
        self.description = description

    def get_storyline(self):
        return self.storyline

    def set_storyline(self, storyline):
        self.storyline = storyline

    def get_status(self):
        return self.status

    def set_status(self, status):
        self.status = status

    def to_dict(self):
        return {
            "title": self.title,
            "description": self.description,
            "storyline": self.storyline,
            "status": self.status
        }
```