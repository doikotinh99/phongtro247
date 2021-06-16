<?php
require_once "./mvc/core/config.php";
class GetIndex extends Config
{
    public function getData($action = 0){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        $query = "SELECT room.id_room, room.room_image, room.room_title, room.room_time, info_room.infor_areage, info_room.infor_price FROM room INNER JOIN info_room on room.id_room = info_room.id_infor WHERE room.room_status = 1 AND info_room.infor_count > 0 AND room.room_timeend > '$timeNow'";
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
    public function getRoomBs($room_id){
        $user_id = $_SESSION['user_id'];
        $query = "SELECT `id_room`, `room_title`, `room_image` FROM `room` WHERE `id_room` = $room_id";
        
        if($result = mysqli_query($this->connect, $query)){
            $row  = mysqli_fetch_array($result);
            $data= $row;
        }
        return $data;
    }
    
    public function getRoomLike(){
        $user_id = $_SESSION['user_id'];
        $query = "SELECT `user_id`, `room_id` FROM `room_like` WHERE `user_id` = $user_id";
        $result = mysqli_query($this->connect, $query);
        $data = array();
        while ($row  = mysqli_fetch_array($result)) {
            $data[] = $this->getRoomBs($row["room_id"]);
        }
        return json_encode($data);
    }
    public function getdataAccount(){
        $user_id = $_SESSION['user_id'];
        $query = "SELECT user.user_email, user.user_pass, infor.infor_firstname,infor.infor_lastname, infor.infor_birth, infor.infor_gender, address.add_wards, address.add_district, address.add_province, infor.infor_phone, infor.infor_iden  FROM user INNER JOIN  infor ON user.user_id = infor.infor_id INNER JOIN address ON infor.infor_address = address.id_add WHERE user.user_id = $user_id";
        $result = mysqli_query($this->connect, $query);
        $data = array();
        while ($row  = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return json_encode($data);
    }
}