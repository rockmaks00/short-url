# Тестовое задание
В рамках тестового задания необходимо реализовать “сократитель” ссылок:

1. Посетитель сайта вводит любой оригинальный URL-адрес в поле ввода, как http://domain/любой/путь/ и т. д.;
2. Нажимает кнопку submit;
3. Страница делает ajax-запрос на сервер и получает уникальный короткий URL-адрес;
4. Короткий URL-адрес отображается на странице как http://yourdomain/abCdE (не используйте внешние Интерфейсы как goo.gl и т. д.);
5. Посетитель может скопировать короткий URL-адрес по кнопке и повторить процесс с другой ссылкой.

Короткий URL должен уникальным, перенаправлять на оригинальную ссылку и быть актуальным навсегда, неважно, сколько раз он был использован.

### Требования:
1. Использовать PHP, JS;
2. Не использовать никаких фрэймворков.

Код пере-используемый из обучающих статей, будет автоматически считаться не зачетным.

# Комментарии к выполнению

Основа для текущего проекта (структура и базовые классы) взята из моего предыдущего: https://github.com/rockmaks00/phptest

В проекте исходя из описания определил 1 сущность - URL, сделал соотв. модель и два контроллера. Первый отвечает за отрисовку главной страницы, второй имеет два метода для взаимодействия с базой. База данных описана в `tables.sql`.

Реализация сокращения ссылок сделана через хеш-функцию передаваемой ссылки укороченную до первых 5 символов. При возникновении коллизии будет выведено соотв. сообщение.

Маршрутизация реализована перебором описанных маршрутов, если они не найдены, то выполняется callback-функция передаваемая вторым параметром в метод execute
```php
Router::route("/", "IndexController@index");
Router::route("/api/url/create", "UrlController@create"); //принимает get-параметр url
                                                          //и возвращает string
Router::execute($_SERVER['REQUEST_URI'], function(){ ... });
```

Значения конфигураций подключения к БД / конфигураций проекта находятся в `config.php` и `db.php` соответственно.