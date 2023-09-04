```python
from ..utils import utils
from ..utils import constants

class Chat:
    def __init__(self):
        self.chatHistory = []

    def startChat(self, user, message):
        if not utils.validateUser(user) or not utils.validateMessage(message):
            return constants.CHAT_STATUS['INVALID']

        chatMessage = {
            'user': user,
            'message': message,
            'timestamp': utils.getCurrentTime()
        }

        self.chatHistory.append(chatMessage)
        return constants.CHAT_STATUS['SUCCESS']

    def getChatHistory(self):
        return self.chatHistory

    def clearChat(self):
        self.chatHistory = []
        return constants.CHAT_STATUS['CLEARED']
```