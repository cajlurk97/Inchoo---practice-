<?php

class Router{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params){
        $this->routes[$route]= $params;
    }

    public function  getRoutes(){
        return $this->routes;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    public function match($url){
        foreach($this->routes as $route => $params){
            if($url == $route){
                $this->$params=$params;
                return true;
            }
        }
        return false;
    }
}