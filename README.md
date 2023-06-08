## About Geolocation API

Geolocation API is a simple api project that allows user to find nearby places. To get the nearby places, Google Map API is used in this project.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/souravnewaz/geolocation_api.git
cd geolocation_api
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You need to provide Google Map API key:
Go to .env file, assign the API Key to 'GOOGLE_MAP_API_KEY' variable

You're all set! Now you can login with:

- **Email:** user@gmail.com
- **Password:** password
