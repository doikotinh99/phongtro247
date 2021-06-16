<?php
require_once "./mvc/core/config.php";
class GetDataAdmin extends Config
{
    public function getDataAccountAdmin($roleId){
        $query = "SELECT infor.infor_firstname, infor.infor_lastname, user.user_email, user.user_id, infor.infor_address, infor.infor_phone, role.role_id , user.user_status FROM infor LEFT JOIN user ON infor.infor_id = user.user_id INNER JOIN role ON user.id_role = role.role_id WHERE role.role_id = $roleId";
        $result = mysqli_query($this->connect, $query);
        $dataAccount = array();
        while ($row  = mysqli_fetch_array($result)) {
            $row["address"] = $this->getDataAddress($row["infor_address"]);
            $dataAccount[] =  $row;
        }
        return json_encode($dataAccount);
    }
    public function getDataAddress($idAdd){
        $query = "SELECT * FROM `address` WHERE `id_add` = $idAdd";
        $data = array();
        if($result = mysqli_query($this->connect, $query)){
            $row  = mysqli_fetch_array($result);
            $data = $row;
            return json_encode($data);
        }else{
            return "null";
        }
    }
    public function getDataSttAcc($roleId, $user_status){
        $query = "SELECT infor.infor_firstname, infor.infor_lastname, user.user_email, user.user_id, infor.infor_address, infor.infor_phone, role.role_id , user.user_status FROM infor LEFT JOIN user ON infor.infor_id = user.user_id INNER JOIN role ON user.id_role = role.role_id WHERE role.role_id = $roleId AND user.user_status = $user_status";
        if($user_status == "2"){
            return $this->getDataAccountAdmin($roleId);
        }
        $result = mysqli_query($this->connect, $query);
        $dataAccount = array();
        while ($row  = mysqli_fetch_array($result)) {
            $row["address"] = $this->getDataAddress($row["infor_address"]);
            $dataAccount[] =  $row;
        }
        return json_encode($dataAccount);
    }
    public function getDataSearch($roleId, $keyW){
        $query = "SELECT * FROM (SELECT CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS fullname, infor.infor_firstname, infor.infor_lastname, user.user_email, user.user_id, infor.infor_address, infor.infor_phone, role.role_id, user.user_status FROM infor LEFT JOIN user ON infor.infor_id = user.user_id INNER JOIN role ON user.id_role = role.role_id) AS TK WHERE TK.role_id = $roleId AND (TK.user_email LIKE '%$keyW%' OR TK.infor_phone LIKE '%$keyW%' OR TK.fullname LIKE '%$keyW%')";
        $result = mysqli_query($this->connect, $query);
        $dataAccount = array();
        while ($row  = mysqli_fetch_array($result)) {
            $row["address"] = $this->getDataAddress($row["infor_address"]);
            $dataAccount[] =  $row;
        }
        return json_encode($dataAccount);
    }
    
    public function getDataRoom($status){
        if($status != 2){
            $query = "SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id WHERE room.room_status <> 2";
        }else{
            $query = "SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id WHERE room.room_status = $status";
        }
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom[] =  $row;
        }
        return json_encode($dataRoom);
    }
    public function getDataRoomActive(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        $query = "SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id WHERE room.room_status = 1 AND room.room_timeend > '$timeNow'";
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom[] =  $row;
        }
        return json_encode($dataRoom);
    }
    public function getDataRoomTime(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        $query = "SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id WHERE room.room_status = 1 AND room.room_timeend < '$timeNow'";
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom[] =  $row;
        }
        return json_encode($dataRoom);
    }
    public function getDataRoomWaiting(){
        $query = "SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id WHERE room.room_status = 0";
        $result = mysqli_query($this->connect, $query);
        $dataRoom = array();
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom[] =  $row;
        }
        return json_encode($dataRoom);
    }
    public function getDataSearchRoom($status, $keyW){
        if($status != "2"){
            $query = "SELECT * FROM (SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id) AS R WHERE R.room_status <> 2 AND (R.room_title LIKE '%$keyW%' OR R.username LIKE '%$keyW%')";
        }
        if($status == "2"){
            $query = "SELECT * FROM (SELECT room.id_room, room.room_title, room.room_time, room.room_timeend, room.room_status, CONCAT_WS(' ', infor.infor_firstname, infor.infor_lastname) AS username FROM room INNER JOIN infor ON room.id_vendor = infor.infor_id) AS R WHERE R.room_status = 2 AND (R.room_title LIKE '%$keyW%' OR R.username LIKE '%$keyW%')";
        }
        $result = mysqli_query($this->connect, $query);
        $dataAccount = array();
        while ($row  = mysqli_fetch_array($result)) {
            $row["address"] = $this->getDataAddress($row["infor_address"]);
            $dataAccount[] =  $row;
        }
        return json_encode($dataAccount);
    }
}