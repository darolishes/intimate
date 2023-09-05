```python
import os

def generate_project_structure(repository_info):
    base_dir = repository_info['base_dir']
    plugin_dirs = repository_info['plugin_dirs']

    for plugin_dir in plugin_dirs:
        os.makedirs(os.path.join(base_dir, plugin_dir), exist_ok=True)

    documentation_dir = os.path.join(base_dir, 'documentation')
    os.makedirs(documentation_dir, exist_ok=True)

    return {
        'base_dir': base_dir,
        'plugin_dirs': plugin_dirs,
        'documentation_dir': documentation_dir
    }
```