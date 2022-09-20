# Poetry Laravel API

## Установка

Для запуска приложения требуется **Docker** и **Docker Compose**.

Для инициализации приложения выполнить команду:
```
make init
```

## Управление

Запуск:
```
make up
```

Остановка приложения:

```
make down
```

Вход в окружение с php:

```
make backend-shell
```

Здесь можно выполнять artisan-команды:

```
php artisan ...
```

## Интерфейсы

Приложение - http://localhost:8080/api

## Тесты

```
make backend-test
```

## Качество кода

Запуск проверки качества кода:

```
make backend-lint
```

Команда выполнит проверку по правилам [Laravel Pint](https://github.com/laravel/pint).

Автоматическое исправление ошибок:

```
make backend-pint-fix
```

## Прочие команды

Генерация данных [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper):

```
make backend-ide-helper
```

Запуск миграций:

```
docker-compose run --rm php-cli php artisan migrate
```

Запуск [Database Seeders](https://laravel.com/docs/9.x/seeding):

```
docker-compose run --rm php-cli php artisan migrate:fresh --seed
```
