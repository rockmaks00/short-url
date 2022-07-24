<?php
class Controller {
    public Model $model;
    public View $view;

    public function __construct() {
        $this->view = new View();
    }
}