## Kanban Board

Kanban Board livestream project

## Installation
```
git clone git@github.com:tuto1902/kanban-board.git

cd kanban-board

composer install

cp .env.example .env

php artisan key:generate

npm install

php artisan migrate

npm run build

-- Only if you are not using Laravel Herd
php artisan serve
```

Go to http://localhost:8000

Or, if you are using Laravel Herd, visit http://kanban-board.test/
