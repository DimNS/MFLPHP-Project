# Шаблон проекта использующий микро-фреймворк [MFLPHP](https://github.com/DimNS/MFLPHP)

## Создание нового проекта
- Устанавливаем копию скелета: `composer create-project dimns/mflphp-project /my/project/path`.
- Переходим в каталог созданного проекта.
- Запускаем `composer install`.
- Запускаем `npm install`.
- Запускаем файл: `gulp.cmd` для Windows или выполняем команду `gulp` для Unix. Чтобы запустить задачу `default` из файла `gulpfile.js`.

## Сборка проекта
- Переходим в каталог созданного проекта.
- Запускаем `gulp build`.

## Примеры

### Проверка идентификации
```php
use MFLPHP\Helpers\NeedLogin;

if ($di->auth->isLogged()) {
    // Пользователь залогинен, можно продолжать
} else {
    NeedLogin::getResponse($request, $response, $service, $di);
}
```

### Проверка авторизации
```php
use MFLPHP\Helpers\AccessDenied;
use MFLPHP\Helpers\IsAdmin;

if (IsAdmin::check($di->userinfo->access)) {
    // Доступ разрешён
} else {
    // Доступ запрещён
    // В зависимости от запроса возвращаем json-ответ или показываем страницу с ошибкой
    AccessDenied::getResponse($request, $response, $service);
}
```

### Проверка валидности защитного csrf-токена (запрос через AJAX)
```php
use MFLPHP\Helpers\InvalidToken;

if ($di->csrf->validateToken($request->server()->get('HTTP_X_CSRFTOKEN', ''))) {
    // Токен успешно прошёл проверку
} else {
    InvalidToken::getResponse($request, $response, $service);
}
```

### Проверка валидности защитного csrf-токена (запрос через форму)
```php
use MFLPHP\Helpers\InvalidToken;

if ($di->csrf->validateToken($request->param('_token'))) {
    // Токен успешно прошёл проверку
} else {
    InvalidToken::getResponse($request, $response, $service);
}
```

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
- АДРЕС_ШАБЛОНА - строка названия шаблона, размещается в файле `/app/Configs/Config.php` в переменной `$this->email_templates`.
- Данные для подстановки в шаблон - массив ключ-значение, где ключи это специальные строки (например: `[[SITE_NAME]]`), а значения - обычные строки для подстановки вместо ключа в шаблоне.

### Конвертор временной метки в дату для вставки в БД
```php
use MFLPHP\Helpers\FormatTime;

echo FormatTime::convert($di->cfg->time);

// Вернёт строку: 03-08-2016 09:26:21
echo FormatTime::convert(1470205581);
```