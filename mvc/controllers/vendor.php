<?php
require_once "./mvc/core/controller.php";
class Vendor extends Controller
{
    public $getModel;
    function __construct()
    {
        
    }

    function index()
    {
        $this -> getModel = $this -> model("getDataVendor");
        $dataRoom = $this->getModel->getDataRoom();
        $main = ["vendor_main"];
        $data = [
            "header" => "header_vendor",
            "main" => $main,
            "dataRoom" => $dataRoom  
            ];
        $data = json_encode($data);
        if($_SESSION['role_name'] == "vendor"){
            $this->view("master_layout", ["data" => $data]);
        }else{
            header('Location: http://phongtro247.xyz/login');
        }
        
    }
    function post_room(){
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        $main = ["vendor_post_room"];
        $data = [
            "pages" => $main,
            "provinc" => $provinc
            ];
        $data = json_encode($data);
        if($_SESSION['role_name'] == "vendor"){
            $this->view("view_form", ["data" => $data]);
        }else{
            header('Location: http://phongtro247.xyz/login');
        }
    }
}
