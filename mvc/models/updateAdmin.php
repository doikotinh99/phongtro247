<?php
require_once "./mvc/models/getDataAdmin.php";
class updateAdmin extends GetDataAdmin
{
    public function actAccount($user_id, $action){
        if($action == "ban"){
            $query = "UPDATE `user` SET `user_status`= 0 WHERE `user_id` = $user_id";
        }
        if($action == "active"){
            $query = "UPDATE `user` SET `user_status`= 1 WHERE `user_id` = $user_id";
        }
        if($result = mysqli_query($this->connect, $query)){
            return $action;
        }else{
            return "false";
        }
    }
    
    public function resetPass($user_id){
        $pass = password_hash("123456", PASSWORD_DEFAULT);
        $query = "UPDATE `user` SET `user_pass`= '$pass' WHERE `user_id` = $user_id";
        if($result = mysqli_query($this->connect, $query)){
            return "true";
        }else{
            return "false";
        }
    }
    public function actPower($user_id, $action){
        $query = "UPDATE `user` SET `id_role`= $action WHERE `user_id` = $user_id";
        if($result = mysqli_query($this->connect, $query)){
            return "true";
        }else{
            return "false";
        }
    }
    public function banRoom($id_room){
        $query = "UPDATE `room` SET `room_status` = 2 WHERE `id_room` = $id_room";
        if($result = mysqli_query($this->connect, $query)){
            return "true";
        }else{
            return "false";
        }
    }
    public function activeRoom($id_room){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $add_time = $this->getCountDay($id_room);
        $time_end  = mktime(0, 0, 0, date("m"),   date("d") + $add_time,   date("Y"));
        $time_end = date('Y-m-d H:i:s', $time_end);
        $query = "UPDATE `room` SET `room_status` = 1, `room_timeend` = '$time_end' WHERE `id_room` = $id_room";
        if($result = mysqli_query($this->connect, $query)){
            return "true";
        }else{
            return "false";
        }
    }
    public function getCountDay($id_room){
        $query = "SELECT `room_countday` FROM `room` WHERE `id_room` = $id_room";
        if($result = mysqli_query($this->connect, $query)){
            $row  = mysqli_fetch_array($result);
            return $row["room_countday"];
        }else{
            return 0;
        }
    }
    public function extendRoom($id_room, $add_time){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeNow = date('Y-m-d H:i:s');
        $time_end  = mktime(0, 0, 0, date("m"),   date("d") + $add_time,   date("Y"));
        $time_end = date('Y-m-d H:i:s', $time_end);
        $query = "UPDATE `room` SET `room_status` = 0, `room_countday` = `room_countday` + $add_time WHERE `id_room` =  $id_room";
        if($result = mysqli_query($this->connect, $query)){
            return "true";
        }else{
            return "false";
        }
    }
}