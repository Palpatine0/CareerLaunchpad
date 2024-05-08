<?php
namespace Framework;

//error inspect
use App\Controllers\ErrorController;

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

    public function route($uri) {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod==='POST'&& isset($_POST['_method'])) {
            $requestMethod = strtoupper($_POST['_method']);
        }

        $uriSegments = explode('/', trim($uri, '/'));

        foreach ($this->routes as $route) {
            $routeSegments = explode('/', trim($route['uri'], '/'));
            $match = false;

            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
                $params = [];
                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }
            }

            if ($match) {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod($params);
                return;
            }
        }


        ErrorController::notFound();
    }


    public function error($httpCode = 404) {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }
}

?>