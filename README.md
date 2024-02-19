<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## System Requirements


- PHP >= 8.1
- Composer
- MySQL
- Nginx

## Run Project
- First update the php version to >= 8.1
- Install MySQL, Apache
- Install Composer
- copy .env.example and rename it to .env
- Update Database Name, Username and Password on .env file
- Run command `composer install` on source folder
- Run `php artisan key:generate` command
- Run command `php artisan migrate:fresh --seed`
- Run command `php artisan serve`

This will run the Airlines CMS http://localhost:8000

## Credentials for login
Email: test@test.com
Password: 123456

