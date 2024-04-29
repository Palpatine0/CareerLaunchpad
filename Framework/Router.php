<?php
namespace Framework;
//error inspect
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//inspectAndDie($uri);
//inspectAndDie($routes);


class Router {
    protected $routes = [];

    private function registerRoute($method, $uri, $action) {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
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
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();

            }
        }

        $this->error();
    }


    public function error($httpCode = 404) {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

}

?>


