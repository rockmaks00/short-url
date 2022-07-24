<?php

class UrlController extends Controller {
    public function __construct() {
        require_once MODEL_PATH . 'UrlModel.php';
        $this->model = new UrlModel();
    }

    private function short($url) {
        return DOMAIN . mb_substr(md5($url), 0, 5);
    }

    public function create() {
        $url = $_GET["url"];
        //базовая проверка URL
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $short = $this->short($url);
            $resp = $this->model->get_url($short);
            //проверка наличия в базе ссылки
            if($resp[0] === null) {
                $this->model->create_url($url, $short);
                echo $short;
            }
            elseif ($resp[0]["url"] === $url) {
                echo $short;
            }
            else
                echo "Ошибка: коллизия или ошибка в БД.";
        }
        else {
            echo "Ошибка: некорректный URL.";
        }
    }

    public function redirect() {
        $short = DOMAIN . substr($_SERVER['REQUEST_URI'], 1);
        $url = $this->model->get_url($short)[0]["url"];
        if($url !== null)
            header("Location: " . $url);
        else
            echo "<h1 style='font-family: Arial; text-align: center'>Данной ссылки не существует.</h1>"; //некрасивая валидация
    }
}
