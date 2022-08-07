
# Laravel9 + Vue 3  + Inertia + TypeScript

## Preview
![image](https://user-images.githubusercontent.com/91175747/183292984-a03a8814-b1b6-4fd8-9cdf-3b418ddab1d7.png)


## Installation

Clone the repo locally:
```
git clone https://github.com/Kaung-Myat-Thway/laravel-vue-inertia.git
```

Install PHP dependencies:

```
composer install
```

Install NPM dependencies:

```
npm install
```

Build assets:

```
npm run dev
```

Setup configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

Create database and configure in `.env` file

eg.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```
php artisan migrate
```

Run Storage Link for Image:

```
php artisan storage:link
```
Run the backend server:

```
php artisan serve
```

Run the frontend server:

```
npm run dev
```

Visit `localhost:8000/products` in your browser.
