# Installation

1. Run  `composer install`

2. Rename `.env.example` to `.env` and configure environment variables.

3. Use this command `php artisan key:generate` to generate APP_KEY

4. Create new db and config environment variables. Example:
    
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=homestead
        DB_USERNAME=homestead
        DB_PASSWORD=secret
    
5. Run `php artisan migrate --seed`

6. Now run `php artisan serv` to run server 

# Features

1. Login / Register
2. Services
3. Roles (Users and admins)
    * Users: can register services
    * Admins: can banner users
4. Users endpoint that include services by users (`http://localhos/api/users`)