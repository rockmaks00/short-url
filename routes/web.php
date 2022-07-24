<?php
//формат - route("uri", "Контроллер@функция")
Router::route("/", "IndexController@index");
Router::route("/api/url/create", "UrlController@create");

Router::execute($_SERVER['REQUEST_URI']);