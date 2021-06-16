<?php
require_once "./mvc/core/config.php";
class GetDataVendor extends Config
{
    public function getDataRoom(){
        $id_vendor = $_SESSION['user_id'];
        $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, room.room_timeend, info_room.infor_areage, info_room.infor_price, room.room_status , info_room.infor_count FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor";
        $result = mysqli_query($this->connect, $query);
        $dataIndex = Array();
        while($row = mysqli_fetch_array($result)){
            $dataVote = $this->getCountVote($row["id_room"]);
            $dataCVst = [
                "v1s" => $this->getCountVoteS($row["id_room"], 1),
                "v2s" => $this->getCountVoteS($row["id_room"], 2),
                "v3s" => $this->getCountVoteS($row["id_room"], 3),
                "v4s" => $this->getCountVoteS($row["id_room"], 4),
                "v5s" => $this->getCountVoteS($row["id_room"], 5),
            ];
            $row["Cvote"] = $dataVote;
            $row["Vst"] = $dataCVst;
            $dataIndex[] = $row;
        }
        return json_encode($dataIndex);
    
    }
    public function getCountVoteS($roomId, $star){
        $query = "SELECT COUNT(*) as vote_star FROM vote WHERE room_id = $roomId AND vote_star = $star GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        $data = 0;
        while ($row  = mysqli_fetch_array($result) ) {
            $data= $row["vote_star"];
        }
        if($data < 1){
            return 0;
        }
        return $data;
    }
    public function getCountVote($roomId){
        $query = "SELECT COUNT(*) as room_id FROM vote WHERE room_id = $roomId GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        $data = 0;
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["room_id"];
        }
        return $data;
    }
    public function getDataSearch($keyW){
        $id_vendor = $_SESSION['user_id'];
        $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price, room.room_timeend, room.room_status FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor AND room.room_title LIKE '%$keyW%'";
        $result = mysqli_query($this->connect, $query);
        $dataIndex = Array();
        while($row = mysqli_fetch_array($result)){
            $dataVote = $this->getCountVote($row["id_room"]);
            $dataCVst = [
                "v1s" => $this->getCountVoteS($row["id_room"], 1),
                "v2s" => $this->getCountVoteS($row["id_room"], 2),
                "v3s" => $this->getCountVoteS($row["id_room"], 3),
                "v4s" => $this->getCountVoteS($row["id_room"], 4),
                "v5s" => $this->getCountVoteS($row["id_room"], 5),
            ];
            $row["Cvote"] = $dataVote;
            $row["Vst"] = $dataCVst;
            $dataIndex[] = $row;
        }
        return json_encode($dataIndex);
    }
    public function actDataRoom($action){
        $id_vendor = $_SESSION['user_id'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        if($action == "active"){
            $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price, room.room_timeend, room.room_status, info_room.infor_count FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor AND room.room_status = 1 AND room.room_timeend > '$timeNow' AND info_room.infor_count > 0";
        }
        if($action == "timeout"){
            $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price, room.room_timeend, room.room_status, info_room.infor_count FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor AND room.room_status = 1 AND room.room_timeend < '$timeNow'";
        }
        if($action == "waiting"){
            $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price, room.room_timeend, room.room_status, info_room.infor_count FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor AND room.room_status = 0";
        }
        if($action == "over"){
            $query = "SELECT room.id_room, room.id_vendor, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price, room.room_timeend, room.room_status, info_room.infor_count FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.id_vendor = $id_vendor AND info_room.infor_count = 0";
        }
        $result = mysqli_query($this->connect, $query);
        $dataIndex = Array();
        while($row = mysqli_fetch_array($result)){
            $dataVote = $this->getCountVote($row["id_room"]);
            $dataCVst = [
                "v1s" => $this->getCountVoteS($row["id_room"], 1),
                "v2s" => $this->getCountVoteS($row["id_room"], 2),
                "v3s" => $this->getCountVoteS($row["id_room"], 3),
                "v4s" => $this->getCountVoteS($row["id_room"], 4),
                "v5s" => $this->getCountVoteS($row["id_room"], 5),
            ];
            $row["Cvote"] = $dataVote;
            $row["Vst"] = $dataCVst;
            $dataIndex[] = $row;
        }
        return json_encode($dataIndex);
    }
}