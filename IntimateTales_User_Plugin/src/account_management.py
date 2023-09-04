```python
import json

class AccountManagement:
    def __init__(self, user_id):
        self.user_id = user_id
        self.account_management_settings = self.load_account_management_settings()

    def load_account_management_settings(self):
        with open('../config/account_management.json') as json_file:
            data = json.load(json_file)
            return data

    def download_user_data(self):
        # Fetch user data from database
        # This is a placeholder for the actual database query
        user_data = {"user_id": self.user_id, "data": "User data"}
        return user_data

    def deactivate_account(self):
        # Update user status in the database
        # This is a placeholder for the actual database query
        return {"user_id": self.user_id, "status": "Deactivated"}

    def manage_account(self, action):
        if action == "download":
            return self.download_user_data()
        elif action == "deactivate":
            return self.deactivate_account()
        else:
            return {"error": "Invalid action"}

# Example usage
account_management = AccountManagement(1)
print(account_management.manage_account("download"))
print(account_management.manage_account("deactivate"))
```