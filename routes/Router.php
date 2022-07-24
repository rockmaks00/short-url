<?php
class Router
{
    private static array $routes = array();

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function route($pattern, $callback)
    {
        self::$routes[$pattern] = $callback;
    }

    public static function execute($url, $else = null)
    {
        $url = explode("?", $url);
        foreach (self::$routes as $pattern => $callback) {
            if (strpos($pattern, $url[0]) !== false) {
                if (is_string($callback)) {
                    $callback_split = explode("@", $callback);
                    $controller_name = $callback_split[0];
                    $action = $callback_split[1];
                    require_once CONTROLLER_PATH . "$controller_name.php";
                    $controller = new $controller_name();
                    return $controller->$action();
                }
                return call_user_func($callback);
            }
        }
        if($else)
            return call_user_func($else);
        throw new Exception("URL not found");
    }
}