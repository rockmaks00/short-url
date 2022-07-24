<?php

class UrlController extends Controller {
    public function __construct() {
        require_once MODEL_PATH . 'UrlModel.php';
        $this->model = new UrlModel();
    }

    public function create() {
        $url = $_GET["url"];
        //проверка ссылки
        if(get_headers($url, 1)) {
            $data = DOMAIN . mb_substr(md5($url), 0, 5);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        }
    }
}