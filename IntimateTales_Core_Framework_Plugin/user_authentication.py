```python
from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout

class UserAuthentication:
    def __init__(self):
        pass

    def authenticate_user(self, username, password):
        user = authenticate(username=username, password=password)
        if user is not None:
            return True, user
        else:
            return False, None

    def login_user(self, request, user):
        login(request, user)

    def logout_user(self, request):
        logout(request)

    def create_user(self, username, password, email):
        user = User.objects.create_user(username, password, email)
        return user

    def change_password(self, user, old_password, new_password):
        if user.check_password(old_password):
            user.set_password(new_password)
            user.save()
            return True
        else:
            return False
```