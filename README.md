# Простой пример api на laravel 8

* Получение списка               `//domain/api/country`
* Получение одного элемента      `//domain/api/country/id`
* Добавление                     `//domain/api/country`
* Редактирование                 `//domain/api/country/id`
* Удаление                       `//domain/api/country/id`


* Дамп для миграции и наполнения тестовой таблицы sql_import.sql

### Установка

* Клонируем проект
* Устанавливаем  `make setup`
* Подключаемся к БД
* Запускаем в бд файл `sql_import.sql` или пишем команду `make migrate` затем `make seed`
* Запускаем приложение `make start`
* Проверяем

## Тесты

* Запускаем тесты `make test`
