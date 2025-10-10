# St Dormitory House

## Requirements
- PHP = 8.3

## Usage
- In root path project, run command:
``` bash
 npm install
 npm run prepare

 - Create .env file, copy content from .env.example to .env file and config your database in .env:
``` bash
APP_DEBUG=false
APP_URL=domain
```
- Run

``` bash
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan route:clear
php artisan config:clear
	
```
- Local development server run

``` bash
php artisan serve
```
