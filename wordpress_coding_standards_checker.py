```python
import phpcs

def check_wordpress_standards(repository_info, plugin_data):
    phpcs_path = '/path/to/phpcs'
    standard = 'WordPress'
    errors = []

    for plugin in plugin_data:
        plugin_path = repository_info['path'] + '/' + plugin['name']
        result = phpcs.run([phpcs_path, '--standard=' + standard, plugin_path])

        if result['totals']['errors'] > 0 or result['totals']['warnings'] > 0:
            errors.append({
                'plugin': plugin['name'],
                'errors': result['totals']['errors'],
                'warnings': result['totals']['warnings'],
                'details': result['files']
            })

    return errors
```