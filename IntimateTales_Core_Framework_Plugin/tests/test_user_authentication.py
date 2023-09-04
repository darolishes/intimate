```python
import unittest
from IntimateTales_Core_Framework_Plugin.user_authentication import UserAuthentication

class TestUserAuthentication(unittest.TestCase):

    def setUp(self):
        self.user_auth = UserAuthentication()

    def test_user_login(self):
        self.assertTrue(self.user_auth.login('test_username', 'test_password'))

    def test_user_logout(self):
        self.assertTrue(self.user_auth.logout())

    def test_check_permission(self):
        self.assertTrue(self.user_auth.check_permission('test_username', 'test_permission'))

    def tearDown(self):
        self.user_auth = None

if __name__ == '__main__':
    unittest.main()
```