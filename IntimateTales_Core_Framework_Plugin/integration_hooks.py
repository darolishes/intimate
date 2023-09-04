```python
# IntimateTales Core Framework Plugin - Integration Hooks
# Author: Dawid Rogaczewski

from abc import ABC, abstractmethod

class BaseHook(ABC):
    """
    Abstract base class for all hooks.
    """

    @abstractmethod
    def execute(self):
        pass


class ActionHook(BaseHook):
    """
    Action hook for executing actions.
    """

    def __init__(self, action):
        self.action = action

    def execute(self):
        self.action()


class FilterHook(BaseHook):
    """
    Filter hook for modifying data.
    """

    def __init__(self, filter_func):
        self.filter_func = filter_func

    def execute(self, data):
        return self.filter_func(data)


class HookManager:
    """
    Manages all hooks in the system.
    """

    def __init__(self):
        self.hooks = {}

    def add_hook(self, hook_name, hook):
        if hook_name not in self.hooks:
            self.hooks[hook_name] = []
        self.hooks[hook_name].append(hook)

    def execute_hook(self, hook_name, *args, **kwargs):
        if hook_name in self.hooks:
            for hook in self.hooks[hook_name]:
                hook.execute(*args, **kwargs)
```
