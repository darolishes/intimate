```python
import unittest
from IntimateTales_Roleplay.src.interactive_tools.chat import Chat

class TestChat(unittest.TestCase):

    def setUp(self):
        self.chat = Chat()

    def test_startChat(self):
        self.chat.startChat()
        self.assertEqual(self.chat.chatStatus, "Started")

    def test_sendMessage(self):
        self.chat.sendMessage("Hello")
        self.assertEqual(self.chat.chatHistory[-1], "Hello")

    def test_endChat(self):
        self.chat.endChat()
        self.assertEqual(self.chat.chatStatus, "Ended")

    def test_getChatHistory(self):
        self.chat.sendMessage("Hello")
        self.chat.sendMessage("How are you?")
        self.assertEqual(self.chat.getChatHistory(), ["Hello", "How are you?"])

if __name__ == '__main__':
    unittest.main()
```