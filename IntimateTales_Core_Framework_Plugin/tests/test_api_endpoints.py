```python
import unittest
from IntimateTales_Core_Framework_Plugin.api_endpoints import APIEndpoints

class TestAPIEndpoints(unittest.TestCase):

    def setUp(self):
        self.api_endpoints = APIEndpoints()

    def test_endpoint_creation(self):
        self.api_endpoints.create_endpoint('test_endpoint')
        self.assertIn('test_endpoint', self.api_endpoints.endpoints)

    def test_endpoint_deletion(self):
        self.api_endpoints.create_endpoint('test_endpoint')
        self.api_endpoints.delete_endpoint('test_endpoint')
        self.assertNotIn('test_endpoint', self.api_endpoints.endpoints)

    def test_endpoint_interaction(self):
        self.api_endpoints.create_endpoint('test_endpoint')
        response = self.api_endpoints.interact_with_endpoint('test_endpoint')
        self.assertEqual(response, 'Endpoint test_endpoint interacted with successfully')

    def tearDown(self):
        self.api_endpoints = None

if __name__ == '__main__':
    unittest.main()
```