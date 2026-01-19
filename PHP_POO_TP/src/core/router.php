<?php
namespace App\Core;

class Router
{
    private $routes = [];

    public function get(string $path, string $handler) { $this->routes['GET'][$this->normalize($path)] = $handler; }
    private function normalize($path) { return rtrim(parse_url($path, PHP_URL_PATH), '/') ?: '/'; }

    public function dispatch(string $method, string $uri)
    {
        $path = $this->normalize($uri);
        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            header("HTTP/1.1 404 Not Found");
            echo "404 Not Found";
            return;
        }

        [$class, $method] = explode('@', $handler);
        if (!class_exists($class)) { throw new \Exception("Controller $class not found"); }
        $controller = new $class();
        if (!method_exists($controller, $method)) { throw new \Exception("Action $method not found"); }
        $controller->$method();
    }
}
