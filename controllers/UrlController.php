<?php

class UrlController extends Controller {
    public function __construct() {
        require_once MODEL_PATH . 'UrlModel.php';
        $this->model = new UrlModel();
    }

    public function create() {
        $url = $_GET["url"];
        //проверка ссылки
        $data = DOMAIN . mb_substr(md5($url), 0, 5);
        echo $data;
    }
}