```python
import ast
import sys

def check_php8_compatibility(plugin_data):
    for plugin in plugin_data:
        try:
            with open(plugin['file_path'], 'r') as file:
                source_code = file.read()
                tree = ast.parse(source_code)
        except FileNotFoundError:
            print(f"File {plugin['file_path']} not found.")
            continue
        except SyntaxError:
            print(f"Syntax error in file {plugin['file_path']}.")
            continue

        for node in ast.walk(tree):
            if isinstance(node, ast.Call) and isinstance(node.func, ast.Name):
                if node.func.id == 'print' and sys.version_info < (3, 8):
                    print(f"PHP 8+ compatibility issue in file {plugin['file_path']}: print function used.")
                elif node.func.id == 'eval' and sys.version_info < (3, 8):
                    print(f"PHP 8+ compatibility issue in file {plugin['file_path']}: eval function used.")
                elif node.func.id == 'exec' and sys.version_info < (3, 8):
                    print(f"PHP 8+ compatibility issue in file {plugin['file_path']}: exec function used.")
```