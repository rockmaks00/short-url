<?php

class UrlController extends Controller {
    public function __construct() {
        require_once MODEL_PATH . 'UrlModel.php';
        $this->model = new UrlModel();
    }

    public function create() {
        $url = $_GET["url"];
        $short = DOMAIN . mb_substr(md5($url), 0, 5);
        $this->model->create_url($url, $short); //если ссылка уже есть в базе, то новая запись не будет создана
        echo $short;
    }

    public function get_url() {
        $short = DOMAIN . substr($_SERVER['REQUEST_URI'], 1);
        $url = $this->model->get_url($short)[0]["url"];
        header("Location: " . $url);
    }
}
