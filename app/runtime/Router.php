<?php

namespace runtime;

use attributesRoute\Route;

class Router
{
    private array $routes;
    public function __construct()
    {
    }

    public function registerRoutesFromControllerAttributes(array $controllers):void
    {
        foreach ($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method) {
                $attributes = $method->getAttributes(Route::class, \ReflectionAttribute::IS_INSTANCEOF);

                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();

                    $this->register($route->method, $route->path, [$controller, $method->getName()]);
                }
            }
        }
    }

    private function register(string $requestMethod, string $requestURI, array $route): void
    {
        $this->routes[$requestMethod][$requestURI] = $route;
    }

    public function get(string $requestURI, array $route): static
    {
        $this->register('get', $requestURI, $route);

        return $this;
    }
    public function post(string $requestURI, array $route): static
    {
        $this->register('post', $requestURI, $route);

        return $this;
    }

    public function resolve(string $requestMethod, string $requestURI): void
    {
        $url = explode('?', $requestURI)[0];
        $action = $this->routes[$requestMethod][$url] ?? null;

        if (is_null($action)) {
            header('Location: /error');
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();
                if (method_exists($class, $method)) {
                    call_user_func_array([$class, $method], []);
                }
            }
        }
    }
}