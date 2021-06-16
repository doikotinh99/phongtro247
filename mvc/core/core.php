<?php
require_once "./mvc/core/controller.php";
class Core extends Controller
{
    protected $controller = "home";
    protected $action = "index";
    protected $parmas = [];
    function __construct()
    {
        $arr = $this->urlprocess();
        // controller
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        } else {
            $this->controller = "error404";
        }
        require_once "./mvc/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;
        // action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // parmas
        $this->parmas = $arr ? array_values($arr) : [];
        
        
        call_user_func_array([$this->controller, $this->action], $this->parmas);
    }
    
    function urlprocess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } else {
            return explode("/", filter_var(trim("home", "/")));
        }
    }
}
