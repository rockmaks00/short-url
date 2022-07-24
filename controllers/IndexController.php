<?php

class IndexController extends Controller
{
    private string $template = "main.view.php";

    public function index()
    {
        $this->view->render($this->template);
    }
}