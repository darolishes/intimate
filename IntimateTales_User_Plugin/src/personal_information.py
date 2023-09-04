```python
import json

class PersonalInformation:
    def __init__(self):
        self.first_name = ""
        self.last_name = ""
        self.gender = ""
        self.date_of_birth = ""

    def set_personal_information(self, first_name, last_name, gender, date_of_birth):
        self.first_name = first_name
        self.last_name = last_name
        self.gender = gender
        self.date_of_birth = date_of_birth

    def get_personal_information(self):
        return {
            "first_name": self.first_name,
            "last_name": self.last_name,
            "gender": self.gender,
            "date_of_birth": self.date_of_birth
        }

    def load_from_config(self, config_file_path):
        with open(config_file_path, 'r') as config_file:
            config_data = json.load(config_file)
            self.set_personal_information(
                config_data.get('first_name', ""),
                config_data.get('last_name', ""),
                config_data.get('gender', ""),
                config_data.get('date_of_birth', "")
            )

    def save_to_config(self, config_file_path):
        with open(config_file_path, 'w') as config_file:
            json.dump(self.get_personal_information(), config_file)
```