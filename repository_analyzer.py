```python
import os
import json

class RepositoryAnalyzer:
    def __init__(self):
        self.repository_info = {}
        self.plugin_data = {}

    def analyze_repository(self, repository_path):
        self.repository_info['path'] = repository_path
        self.repository_info['size'] = self.get_repository_size(repository_path)
        self.repository_info['plugin_count'] = self.get_plugin_count(repository_path)

    def get_repository_size(self, repository_path):
        total_size = 0
        for dirpath, dirnames, filenames in os.walk(repository_path):
            for f in filenames:
                fp = os.path.join(dirpath, f)
                total_size += os.path.getsize(fp)
        return total_size

    def get_plugin_count(self, repository_path):
        plugin_count = 0
        for dirpath, dirnames, filenames in os.walk(repository_path):
            if 'plugin.json' in filenames:
                plugin_count += 1
                self.plugin_data[dirpath] = self.get_plugin_data(os.path.join(dirpath, 'plugin.json'))
        return plugin_count

    def get_plugin_data(self, plugin_path):
        with open(plugin_path, 'r') as f:
            data = json.load(f)
        return data

    def save_repository_info(self, file_path):
        with open(file_path, 'w') as f:
            json.dump(self.repository_info, f)

    def save_plugin_data(self, file_path):
        with open(file_path, 'w') as f:
            json.dump(self.plugin_data, f)

if __name__ == "__main__":
    analyzer = RepositoryAnalyzer()
    analyzer.analyze_repository('/path/to/repository')
    analyzer.save_repository_info('repository_info.json')
    analyzer.save_plugin_data('plugin_data.json')
```