<?php
require_once "./mvc/core/controller.php";
class Timkiem extends Controller
{
    public $getModel;
    function __construct()
    {
        $this -> getModel = $this -> model("getIndex");
        //TRONGNV
        $this -> getModel = $this -> model("searchmodel");
    }

    function index()
    {
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        
        $main = ["search_main"];
        $data = [
            "main" => $main,
            "provinc" => $provinc
            ];
        $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
    function timphong($postProvinc, $postDistrict, $postWard, $price, $acreage)
    {
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        // $dataRoom = $this->getModel->getData();
        $main = ["search_main"];
        $data = [
            "main" => $main,
            "provinc" => $provinc,
            "provincss" => $postProvinc
            ];
        $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
    
    // function searchroom(){
    //     $tinh = $_POST[];
    //     $huyen = $_POST[];
    //     $xa = $_POST[];
    //     $gia = $_POST[];
    //     $dientich = $_POST[];
        
    // }
    
}
