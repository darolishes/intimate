```python
import os
from pydoc import writedoc

def generate_documentation(repository_info, plugin_data):
    """
    Function to generate documentation for the code in the repository.
    """
    # Iterate over each plugin in the repository
    for plugin in plugin_data:
        # Get the path of the plugin
        plugin_path = os.path.join(repository_info['path'], plugin['name'])
        
        # Generate documentation for each file in the plugin
        for root, dirs, files in os.walk(plugin_path):
            for file in files:
                if file.endswith('.py'):
                    file_path = os.path.join(root, file)
                    writedoc(file_path)
                    
    print("Documentation generated successfully.")

# Test the function with sample data
repository_info = {'path': '/path/to/repository'}
plugin_data = [{'name': 'plugin1'}, {'name': 'plugin2'}]
generate_documentation(repository_info, plugin_data)
```