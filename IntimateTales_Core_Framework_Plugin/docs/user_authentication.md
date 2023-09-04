# User Authentication

The User Authentication module is a part of the IntimateTales Core Framework Plugin, authored by Dawid Rogaczewski. It manages user authentication and access permissions throughout the platform.

## Purpose

The purpose of this module is to provide a secure and reliable system for user authentication. It ensures that only authorized users can access certain parts of the platform.

## Usage

To use the User Authentication module, import it in your code as follows:

```python
from IntimateTales_Core_Framework_Plugin.user_authentication import UserAuthentication
```

Then, create an instance of the UserAuthentication class and call the appropriate methods for user authentication.

```python
auth = UserAuthentication()
auth.login(username, password)
```

## Methods

### login(username: str, password: str) -> bool

This method takes a username and password as input and returns a boolean indicating whether the login was successful.

### logout() -> None

This method logs out the current user.

### register(username: str, password: str, email: str) -> bool

This method registers a new user with the given username, password, and email. It returns a boolean indicating whether the registration was successful.

### change_password(old_password: str, new_password: str) -> bool

This method changes the password of the current user. It takes the old password and the new password as input and returns a boolean indicating whether the password change was successful.

## Examples

Here are some examples of how to use the User Authentication module:

```python
# Create an instance of UserAuthentication
auth = UserAuthentication()

# Register a new user
auth.register('username', 'password', 'email@example.com')

# Login
auth.login('username', 'password')

# Change password
auth.change_password('old_password', 'new_password')

# Logout
auth.logout()
```

For more detailed information, please refer to the source code in `user_authentication.py` and the test cases in `tests/test_user_authentication.py`.