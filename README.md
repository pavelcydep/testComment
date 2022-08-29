Как установить проект?
================
## Для начала работы вам необходимо:
скопировать проект:
git clone https://github.com/pavelcydep/company.git

## Далее следует выполнить следующюю команду:
php artisan migrate:fresh --seed

## Добавление тестовых данных в таблицу Users:
php artisan tinker
User::factory()->count(100)->create();

## Запуск проекта:
php artisan serve

## Авторизация по логину:
 http://127.0.0.1:8000/login

### Пользователь с правами админа(удаление,добавление,изменение):
email:test@example.com
password:password

### Пользователь:
email:test2@example.com
password:password

Стек технологий
===============
PHP, LARAVEL  , HTML, СSS , jquery , Ajax, БЭМ
