<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response=$response;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    public function post(string $path,$callback){
        $this->routes['post'][$path]=$callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            $callback[0]=new $callback[0];
            Application::$app->setController($callback[0]);
        }
        return call_user_func($callback,$this->request,$this->response);
    }

    public function renderView(string $view ,array $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace("{{content}}",$viewContent,$layoutContent);
    }
    public function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view,$params){
        foreach ($params as $key=>$value){
            $$key = $value;
        }


        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}