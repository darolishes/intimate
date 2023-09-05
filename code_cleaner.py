```python
import ast
import astor

def clean_code(plugin_data):
    for plugin in plugin_data:
        source_code = plugin['code']
        tree = ast.parse(source_code)
        cleaner = CodeCleaner()
        cleaner.visit(tree)
        cleaned_code = astor.to_source(tree)
        plugin['code'] = cleaned_code

class CodeCleaner(ast.NodeTransformer):
    def visit_Import(self, node):
        if not node.names[0].name.startswith('plugin_data'):
            return None
        return node

    def visit_ImportFrom(self, node):
        if not node.module.startswith('plugin_data'):
            return None
        return node

    def visit_Call(self, node):
        if isinstance(node.func, ast.Name) and node.func.id == 'print':
            return None
        return self.generic_visit(node)
```