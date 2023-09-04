# IntimateTales

IntimateTales is a web application that encapsulates the essence of interactive storytelling. It's more than a role-playing game; it's a journey where every choice molds the narrative. Venture into a dynamically evolving world, create a character that resonates with your essence, and collaborate in real time with fellow adventurers. Whether you're taking a break or calling it a day, rest assured, with integrated progress tracking, your story waits for your return.

## Tech Stack

- Laravel
- MySQL
- Custom AI algorithms
- WebSocket technology for live, real-time user interactions.
- Smooth RESTful APIs ensure seamless synchronization with the overarching IntimateTales app and complementary modules.

## Installation

Clone the repository and install dependencies:

```
git clone https://github.com/yourusername/IntimateTales.git
cd IntimateTales
composer install
npm install
```

Copy the `.env.example` file to a new file named `.env` and update the database and other configuration settings as needed.

```
cp .env.example .env
```

Generate an application key:

```
php artisan key:generate
```

Run the database migrations:

```
php artisan migrate
```

Start the application:

```
php artisan serve
```

## Usage

Navigate to the application in your web browser:

```
http://localhost:8000
```

Enjoy the interactive storytelling experience!

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)