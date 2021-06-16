<?php
require_once "./mvc/core/controller.php";
class Home extends Controller
{
    public $getModel;
    function __construct()
    {
        $this -> getModel = $this -> model("getIndex");
    }

    function index()
    {
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        $dataRoom = $this->getModel->getData();
        $RoomLike = $this->getModel->getRoomLike();
        $dataRoomHl = $this->getModel->getData("HL");
        $main = ["index_new"];
        $data = [
            "sshow" => "slideshow_header",
            "main" => $main,
            "dataRoom" => $dataRoom,
            "dataRoomHL" => $dataRoomHl,
            "provinc" => $provinc,
            "RoomLike" => $RoomLike
            ];
        $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
    function thong_tin_tai_khoan()
    {
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        $dataAccount = $this -> getModel->getdataAccount();
        $main = ["infor_account"];
        $data = [
            "main" => $main,
            "provinc" => $provinc,
            "dataAccount" => $dataAccount
            ];
        $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
    function lienhe()
    {
        $main = ["index_contact"];
        $data = [
            "main" => $main
            ];
        $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
}
