```python
class Documentation:
    """
    This class provides methods for generating and managing documentation for the IntimateTales Roleplay Module.
    """

    def __init__(self):
        """
        Initializes the Documentation class.
        """
        self.classes = []
        self.methods = []
        self.integration_points = []

    def add_class(self, class_name, description):
        """
        Adds a class to the documentation.

        Args:
            class_name (str): The name of the class.
            description (str): A description of the class.
        """
        self.classes.append({"name": class_name, "description": description})

    def add_method(self, method_name, description):
        """
        Adds a method to the documentation.

        Args:
            method_name (str): The name of the method.
            description (str): A description of the method.
        """
        self.methods.append({"name": method_name, "description": description})

    def add_integration_point(self, integration_point, description):
        """
        Adds an integration point to the documentation.

        Args:
            integration_point (str): The name of the integration point.
            description (str): A description of the integration point.
        """
        self.integration_points.append({"name": integration_point, "description": description})

    def generate_documentation(self):
        """
        Generates the documentation for the IntimateTales Roleplay Module.
        """
        print("Classes:")
        for class_doc in self.classes:
            print(f"Name: {class_doc['name']}\nDescription: {class_doc['description']}\n")

        print("Methods:")
        for method_doc in self.methods:
            print(f"Name: {method_doc['name']}\nDescription: {method_doc['description']}\n")

        print("Integration Points:")
        for integration_doc in self.integration_points:
            print(f"Name: {integration_doc['name']}\nDescription: {integration_doc['description']}\n")
```