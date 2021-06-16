<?php 
class Controller{
    // laays file model
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }
    // lấy file view
    public function view($view, $data = []){
        require_once "./mvc/views/".$view.".php";
    }
    // cắt url lấy phần controller
    public function urlcontroller($controller){

        $url = "";
        switch($controller){
            case "home": 
                $url = "home";
            break;
            case "": 
                $url = "home";
            break;
            default: $url = "error404";
            break;
        }
        return $url;
    }
    // cắt url lấy phần action 
    public function urlaction($action){
        $url = "error";
        switch ($action) {
            case "index":
                $url = "index";
                break;
            case "":
                $url = "index";
                break;
            default:
                $url = "error404";
                break;
        }
        return $url;
    } 
    // trang lỗi url
    public function Error(){
        $this->view("error404",[
            "404" => "error"
        ]);
    }
}




?>
