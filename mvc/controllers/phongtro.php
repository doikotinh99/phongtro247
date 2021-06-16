<?php
require_once "./mvc/core/controller.php";
class Phongtro extends Controller
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
    public function __construct()
    {
    }

    function index()
    {
        $main = ["room_info", "room_main"];
        $main_left = ["room_inforVD"];
        $main_ft = ["room_similar"];
        $this->view("master_layout", [
            "bread" => "breadcrumb",
            "main" => $main,
            "main_left" => $main_left,
            "main_ft" => $main_ft
            ]);
    }
    function chitietphongtro($id)
    {
        $this -> SetModel("getRoom");
        $model = $this -> GetModel();
        $this->SetData("dataRoom", $model->getData($id, "room", "id_room"));
        $this->SetData("dataAdd", $model->getData($id, "address", "id_add"));
        $this->SetData("dataCmt", $model->getDataCmt($id));
        $this->SetData("datainfor", $model->getData($id, "info_room", "id_infor"));
        $this->SetData("dataLike", $model->getData($id, "room_like", "id_like"));
        if(isset($_SESSION['user_id'])){
            $this->SetData("dataUVote", $model->getUVote($id,$_SESSION['user_id']));
        }else{
            $dataUVote = false;
        }
        $this->SetData("dataVendor", $model->getDataVendor($id));
        $this->SetData("dataIdVendor", $model->getIdVendor($id));
        $this->SetData("dataCountVote", $model->getCountVote($id));
        $dataVoteStar = [
            "v1s" => $model->getCountVoteS($id, 1),
            "v2s" => $model->getCountVoteS($id, 2),
            "v3s" => $model->getCountVoteS($id, 3),
            "v4s" => $model->getCountVoteS($id, 4),
            "v5s" => $model->getCountVoteS($id, 5),
            ];
        
        $dataVoteStar = json_encode($dataVoteStar);
        $this->SetData("dataVoteStar", $dataVoteStar);
        $this->SetData("dataCountLike", $model->getCountlike($id));
        if(isset($_SESSION['user_id'])){
            $this->SetData("dataULike", $model->getULike($id, $_SESSION['user_id']));
        }
        
        $main = ["room_info", "room_main"];
        $main_left = ["room_inforVD"];
        $main_ft = ["room_similar"];
        $data = [
            "bread" => "breadcrumb",
            "main" => $main,
            "main_left" => $main_left,
            "main_ft" => $main_ft,
            "vendor" => $this->GetData("dataVendor"),
            "idVendor" => $this->GetData("dataIdVendor"),
            "room" => $this->GetData("dataRoom"),
            "address" => $this->GetData("dataAdd"),
            "comment" => $this->GetData("dataCmt"),
            "infor" => $this->GetData("datainfor"),
            "like" => $this->GetData("dataLike"),
            "voteU" => $this->GetData("dataUVote"),
            "voteCount" => $this->GetData("dataCountVote"),
            "voteStar" => $this->GetData("dataVoteStar"),
            "countLike" => $this->GetData("dataCountLike"),
            "likeU"=>$this->GetData("dataULike")
            ];
            $data = json_encode($data);
        $this->view("master_layout", ["data" => $data]);
    }
    
    function RoomComment($id, $id_cmt)
    {
        $this -> SetModel("getRoom");
        $model = $this -> GetModel();
        $main = ["room_comment"];
        $this->SetData("dataNewCmt", $model->getDataCmt($id, $id_cmt));
        $this->SetData("dataIdVendor", $model->getIdVendor($id));
        $data = [
            "pages" => $main,
            "NewComment" => $this->GetData("dataNewCmt"),
            "idVendor" => $this->GetData("dataIdVendor")
            ];
            $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    function RoomVote($id, $id_vote)
    {
        $this -> SetModel("getRoom");
        $model = $this -> GetModel();
        $main = ["room_vote"];
        $this->SetData("dataRoom", $model->getData($id, "room", "id_room"));
        $this->SetData("dataCountVote", $model->getCountVote($id));
        $dataVoteStar = [
            "v1s" => $model->getCountVoteS($id, 1),
            "v2s" => $model->getCountVoteS($id, 2),
            "v3s" => $model->getCountVoteS($id, 3),
            "v4s" => $model->getCountVoteS($id, 4),
            "v5s" => $model->getCountVoteS($id, 5),
            ];
        $dataVoteStar = json_encode($dataVoteStar);
        $this->SetData("dataVoteStar", $dataVoteStar);
        $data = [
            "pages" => $main,
            "room" => $this->GetData("dataRoom"),
            "voteCount" => $this->GetData("dataCountVote"),
            "voteStar" => $this->GetData("dataVoteStar")
            ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    function repCmt($idRepCmt){
        $this -> SetModel("getRoom");
        $model = $this -> GetModel();
        $main = ["room_repCmt"];
        $this->SetData("dataNewRepCmt", $model->getNewDataRepCmt($idRepCmt));
        $this->SetData("dataIdVendor", $model->getIdVendor($id));
        $data = [
            "pages" => $main,
            "dataNewRepCmt" => $this->GetData("dataNewRepCmt"),
            "idVendor" => $this->GetData("dataIdVendor"),
            ];
            $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
}
