```python
import unittest
from IntimateTales_Roleplay.src.loading import interactive_loading

class TestInteractiveLoading(unittest.TestCase):

    def setUp(self):
        self.loading = interactive_loading.InteractiveLoading()

    def test_show_loading(self):
        self.loading.showLoading()
        self.assertEqual(self.loading.loading_status, "loading")

    def test_hide_loading(self):
        self.loading.hideLoading()
        self.assertEqual(self.loading.loading_status, "idle")

    def test_update_loading_message(self):
        test_message = "Loading character data..."
        self.loading.updateLoadingMessage(test_message)
        self.assertEqual(self.loading.loading_message, test_message)

if __name__ == '__main__':
    unittest.main()
```