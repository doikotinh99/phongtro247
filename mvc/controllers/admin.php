<?php
require_once "./mvc/core/controller.php";
class Admin extends Controller
{
    private $getModel;
    private $AllData = array();
    
    public function SetModel($ModelName){
        $this -> ConnModel = $this -> model($ModelName);
    }
    
    public function GetModel(){
        return $this -> ConnModel;
    }
    public function SetData($key, $value){
        $this->AllData[$key] = $value;
    }
    
    public function GetData($key){
        if(isset($this->AllData["$key"])){
            return $this->AllData["$key"];
        }
    }
    function __construct()
    {
        
    }

    function index()
    {
        $data = [
            "page" => "admin_menu_left"
            ];
        $data = json_encode($data);
        if($_SESSION['role_name'] == "admin"){
            $this->view("view_admin", ["data" => $data]);
        }else{
            header('Location: http://phongtro247.xyz/login');
        }
        
    }
}
