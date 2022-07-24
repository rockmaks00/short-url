<?php
class View {
    public function render($template, $page_data = null) {
        include VIEW_PATH . $template;
    }
}