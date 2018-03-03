## Features

- Laravel 5.5
- Vue + VueRouter + Vuex + VueI18n
- Pages with custom layouts
- Login, register and password reset
- Authentication with [JWT](https://github.com/tymondesigns/jwt-auth)
- Socialite integration
- Bootstrap 4 + Font Awesome 5

## Installation

- `git clone URL name_example`
- `cd name_example`
- `cp .env.example .env`
- `composer install`
- `php artisan key:generate`
- `php artisan jwt:secret`
- Edit `.env` and set your database connection details
- `php artisan migrate`
- `npm install` / `yarn`

## Usage

#### Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run production
```
```Paths case run in apache root/application
APP_URL=http://localhost/application
IMAGES_PATH=http://localhost/application/images/
```

#### DataBase Oracle Selects config .env

```DB_CONNECTION_ORACLE=mysql
DB_HOST_ORACLE=
DB_PORT_ORACLE=1521
DB_DATABASE_ORACLE=
DB_USERNAME_ORACLE=
DB_SERVICE_NAME_ORACLE=
DB_PASSWORD_ORACLE=
```
