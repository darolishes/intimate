```python
import time
from tkinter import *

# Shared dependencies
loadingBar = "loadingBar"
spinner = "spinner"

def displayLoading():
    # Create a new window
    window = Tk()
    window.title("Loading...")

    # Create a loading bar
    loadingBar = Canvas(window, width=100, height=20, bg="white")
    loadingBar.pack()

    # Create a spinner
    spinner = Canvas(window, width=20, height=20, bg="white")
    spinner.pack()

    # Update the loading bar and spinner
    for i in range(100):
        loadingBar.create_rectangle(0, 0, i, 20, fill="blue")
        spinner.create_arc(0, 0, 20, 20, start=i*3.6, extent=3.6, fill="red")
        window.update()
        time.sleep(0.01)

    # Close the window after loading
    window.destroy()

# Test the function
displayLoading()
```