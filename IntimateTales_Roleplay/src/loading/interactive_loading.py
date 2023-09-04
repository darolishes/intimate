```python
import time
from utils.constants import LOADING_STATUS

class InteractiveLoading:
    def __init__(self):
        self.status = LOADING_STATUS['NOT_STARTED']

    def show_loading(self):
        self.status = LOADING_STATUS['LOADING']
        print("Loading...")

    def update_loading(self, percentage):
        print(f"Loading... {percentage}%")

    def hide_loading(self):
        self.status = LOADING_STATUS['COMPLETED']
        print("Loading completed.")

    def simulate_loading(self, duration):
        self.show_loading()
        for i in range(1, duration+1):
            time.sleep(1)
            self.update_loading(i*100/duration)
        self.hide_loading()

if __name__ == "__main__":
    loading = InteractiveLoading()
    loading.simulate_loading(10)
```