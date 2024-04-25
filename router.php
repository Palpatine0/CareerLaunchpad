<?php

//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//inspectAndDie($uri);
//inspectAndDie($routes);


class Router {
    protected $routes = [];

    private function registerRoute($method, $uri, $controller) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function addGet($uri, $controller) {
        $this->registerRoute('GET', $uri, $controller);
    }

    public function addPost($uri, $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function addPut($uri, $controller) {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function addDelete($uri, $controller) {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }
        echo "No matching route found for URI: " . $uri . " and method: " . $method . "\n";
        echo "Registered routes: " . print_r($this->routes, true) . "\n";
        http_response_code(404);
        loadView("error/404");
    }


}

?>


