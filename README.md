# St Dormitory House

# St Dormitory House

## Requirements
- PHP = 8.3
- NodeJs >= 20.19.0

## Usage
- In root path project, run command:
```bash
npm install
npm run prepare
```

- Create `.env` file, copy content from `.env.example` to `.env` and configure your database in `.env`:
```bash
APP_DEBUG=false
APP_URL=domain
```

- Run:
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan route:clear
php artisan config:clear
```

- Local development server run:
```bash
php artisan serve
```
- Local development server run
