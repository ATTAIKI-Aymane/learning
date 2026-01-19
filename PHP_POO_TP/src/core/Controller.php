<?php
namespace App\Core;

class Controller
{
    protected function render(string $view, array $params = [])
    {
        extract($params, EXTR_SKIP);
        $viewFile = __DIR__ . '/../../views/' . $view . '.php';
        if (!file_exists($viewFile)) { throw new \Exception("View $view not found"); }
        require $viewFile;
    }
}