## Project is deprecated.

# Шаблон проекта использующий микро-фреймворк [MFLPHP](https://github.com/DimNS/MFLPHP)

# 1. Установка и использование

## 1.1. Создание нового проекта
- Устанавливаем копию скелета: `composer create-project dimns/mflphp-project /my/project/path`.
- Переходим в каталог созданного проекта.
- Запускаем `npm install`.
- Запускаем `gulp build` для сборки файлов. Или можно пользоваться скриптом: `gulp-build.cmd`.
- Запускаем `gulp` для автоматической пересборки при изменениях во время разработки. Или можно пользоваться скриптом: `gulp-watch.cmd`.

## 1.2. Сборка проекта
- Переходим в каталог созданного проекта.
- Запускаем `gulp build`. Или можно пользоваться скриптом: `gulp-build.cmd`.

# 2. PHP

## 2.1. Middleware
Для проверки "пользователь в системе", "валидный токен" или "есть необходимые права доступа" достаточно выполнить хелпера-посредника:
```php
$middleware = \MFLPHP\Helpers\Middleware::start($request, $response, $service, $di, [
    'auth',         // Пользователь залогинен в системе
    'token',        // Проверка валидности защитного csrf-токена
    'access-admin', // Проверка прав доступа
]);
if ($middleware) {
    // Этот код выполняется если все проверки выполнены
}
```

## 2.2. Отладка SQL-запросов
Если в настройках включен режим DEBUG, тогда включается логирование всех SQL-запросов, которые можно получить как массив:
```php
dump(\ORM::get_query_log());
```

## 2.3. Примеры хелперов

### Отправка письма
```php
$send_result = $di->mail->send('АДРЕС_ДЛЯ_ОТПРАВКИ', 'ТЕМА_ПИСЬМА', 'АДРЕС_ШАБЛОНА', [
    // Данные для подстановки в шаблон
]);
if ($send_result) {
    // Письмо успешно отправлено
} else {
    // Произошла ошибка
    // Подробнее можно посмотреть в логе по адресу /errors.log
}
```
- АДРЕС_ШАБЛОНА - строка константы шаблона, размещается в файле `/app/Configs/EmailTemplates.php` в виде соответствующих констант.
- Данные для подстановки в шаблон - массив ключ-значение, где ключи это специальные строки (например: `[[SITE_NAME]]`), а значения - обычные строки для подстановки вместо ключа в шаблоне.

# 3. JS

## 3.1. ajax (POST)

```javascript
ajax.waiter('show');

$.ajax({
    url: '/controller/method',
    data: {
        // Параметры
    },
    success: function(result, textStatus, jqXHR) {
        // Обработка результата
    },
    complete: function() {
        ajax.waiter('hide');
    },
    error: function(jqXHR, textStatus, errorThrown) {
        ajax.error(textStatus, errorThrown);
    }
});
```

## 3.2. jsonp (GET)

```javascript
ajax.jsonp('/controller/method', {
    // Параметры
}, function(result) {
    ajax.waiter('hide');

    // Обработка результата
});
```

Возвращение результата на стороне php:

```php
$result = [/* Ваш массив с данными результата */];
$response->json($result, $request->param('callback', 'callback'));
```
