<?php
require_once "./mvc/core/config.php";
class GetRoom extends Config
{
    
    public function getData($roomId, $tableName, $cond){
        $query = "select * from $tableName where `$cond` = '$roomId'";
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        $row  = mysqli_fetch_array($result);
        $dataRoom[] = $row;
        return json_encode($dataRoom);
    }
    
    public function getDataVendor($roomId){
        $id_vendor = $this -> getIdVendor($roomId);
        $query = "SELECT infor.infor_firstname, infor.infor_lastname, infor.infor_phone, infor.infor_avatar, address.* FROM infor INNER JOIN address ON infor.infor_address = address.id_add WHERE infor.infor_id = '$id_vendor'";
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom[] =  $row;
        }
        return json_encode($dataRoom);
    }
    public function getIdVendor($roomId){
        $query = "select id_vendor from room where `id_room` = '$roomId'";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["id_vendor"];
        }
        return $data;
    }
    
    public function getDataCmt($id_room, $id_comment = null){
        if(isset($id_comment)){
            $query = "SELECT infor.infor_firstname, infor.infor_lastname,comment.id_comment, comment.cmt_content, comment.cmt_time, comment.room_id, user.id_role, role.role_name, user.user_id FROM infor INNER JOIN comment ON comment.user_id = infor.infor_id INNER JOIN user ON infor.infor_id = user.user_id INNER JOIN role ON role.role_id = user.id_role WHERE comment.room_id = $id_room AND comment.id_comment = $id_comment ORDER BY id_comment DESC";
        }else{
            $query = "SELECT infor.infor_firstname, infor.infor_lastname,comment.id_comment, comment.cmt_content, comment.cmt_time, comment.room_id, user.id_role, role.role_name, user.user_id FROM infor INNER JOIN comment ON comment.user_id = infor.infor_id INNER JOIN user ON infor.infor_id = user.user_id INNER JOIN role ON role.role_id = user.id_role WHERE comment.room_id = $id_room ORDER BY id_comment DESC";
        }
        $result = mysqli_query($this->connect, $query);
        $data = array();
        $i = 0;
        while ($row  = mysqli_fetch_array($result)) {
            $dataRepCmt = $this -> getDataRepCmt($row["id_comment"]);
            $row["vote"] = $this -> getVoteRoom($row["user_id"],$id_room);
            $row["repComment"] = $dataRepCmt;
            $data[] =  $row;
        }
        return json_encode($data);
    }
    public function getVoteRoom($user_id, $room_id){
        $query = "SELECT `vote_star` FROM `vote` WHERE `user_id` = $user_id AND `room_id` = $room_id";
        $result = mysqli_query($this->connect, $query);
        $data = null;
        while ($row  = mysqli_fetch_array($result)) {
            $data =  $row["vote_star"];
        }
        return $data;
    }
    public function getDataRepCmt($id_cmt){
        $query = "SELECT infor.infor_firstname, infor.infor_lastname, rep_comment.rep_content, rep_comment.rep_time, user.id_role, role.role_name, user.user_id FROM infor 
        INNER JOIN rep_comment ON rep_comment.id_user = infor.infor_id 
        INNER JOIN comment ON comment.id_comment = rep_comment.id_cmt 
        INNER JOIN user ON infor.infor_id = user.user_id 
        INNER JOIN role ON role.role_id = user.id_role 
        WHERE comment.id_comment = $id_cmt ORDER BY rep_id DESC";
        $result = mysqli_query($this->connect, $query);
        $data = array();
        while ($row  = mysqli_fetch_array($result)) {
            $data[] =  $row;
        }
        return $data;
    }
    public function getNewDataRepCmt($idRepCmt){
        $query = "SELECT infor.infor_firstname, infor.infor_lastname, rep_comment.rep_content, rep_comment.rep_time, user.id_role, role.role_name, user.user_id FROM infor 
        INNER JOIN rep_comment ON rep_comment.id_user = infor.infor_id
        INNER JOIN user ON infor.infor_id = user.user_id 
        INNER JOIN role ON role.role_id = user.id_role 
        WHERE rep_comment.rep_id = $idRepCmt";
        $result = mysqli_query($this->connect, $query);
        $data = array();
        while ($row  = mysqli_fetch_array($result)) {
            $data[] =  $row;
        }
        return json_encode($data);
    }
    public function checkCmt($user_id, $room_id){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        $query = "SELECT MAX(`cmt_time`) as cmt_time FROM `comment` WHERE `user_id` = $user_id AND `room_id` = $room_id";
        if($result = mysqli_query($this->connect, $query)){
            $row  = mysqli_fetch_array($result);
            $timeInt = strtotime($timeNow) - strtotime($row["cmt_time"]);
            return $timeInt;
        }else{
            return 301;
        }
    }
    public function getCountVote($roomId){
        $query = "SELECT COUNT(*) as room_id FROM vote WHERE room_id = $roomId GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["room_id"];
        }
        return $data;
    }
    public function getCountVoteS($roomId, $star){
        $query = "SELECT COUNT(*) as vote_star FROM vote WHERE room_id = $roomId AND vote_star = $star GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        $data = null;
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["vote_star"];
        }
        if($data < 1){
            return 0;
        }
        return $data;
    }
    public function getUVote($roomId, $id_user){
        $query = "SELECT * FROM vote WHERE room_id = $roomId AND user_id = $id_user";
        $result = mysqli_query($this->connect, $query);
        $data = array();
        while ($row  = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return json_encode($data);
    }
    public function checkVote($roomId, $id_user){
        $query = "SELECT `id_vote` FROM vote WHERE room_id = $roomId AND user_id = $id_user";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data = $row["id_vote"];
        }
        return (int)$data;
    }
    public function getCountlike($roomId){
        $query = "SELECT COUNT(*) as room_id FROM room_like WHERE room_id = $roomId GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["room_id"];
        }
        return $data;
    }
    public function getULike($roomId, $user_id){
        $query = "SELECT COUNT(*) as room_id FROM room_like WHERE room_id = $roomId AND user_id = $user_id GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["room_id"];
        }
        if($data < 1){
            return 0;
        }
        return $data;
    }
    

    
}


