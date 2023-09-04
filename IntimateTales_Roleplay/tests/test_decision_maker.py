```python
import unittest
from src.interactive_tools.decision_maker import DecisionMaker

class TestDecisionMaker(unittest.TestCase):

    def setUp(self):
        self.decision_maker = DecisionMaker()

    def test_make_decision(self):
        decision = self.decision_maker.make_decision("Go to the castle")
        self.assertEqual(decision, "Go to the castle")

    def test_get_decision_history(self):
        self.decision_maker.make_decision("Go to the castle")
        self.decision_maker.make_decision("Talk to the king")
        history = self.decision_maker.get_decision_history()
        self.assertEqual(history, ["Go to the castle", "Talk to the king"])

    def test_clear_decision_history(self):
        self.decision_maker.make_decision("Go to the castle")
        self.decision_maker.clear_decision_history()
        history = self.decision_maker.get_decision_history()
        self.assertEqual(history, [])

if __name__ == '__main__':
    unittest.main()
```