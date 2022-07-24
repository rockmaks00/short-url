<?php
//формат - route("uri", "Контроллер@функция")
Router::route("/", "IndexController@index");
Router::route("/api/url/create", "UrlController@create");

Router::execute($_SERVER['REQUEST_URI'], function(){
    require_once CONTROLLER_PATH . "UrlController.php";
    $controller = new UrlController();
    $controller->get_url();
});