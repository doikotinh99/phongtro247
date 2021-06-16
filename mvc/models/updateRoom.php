<?php
// require_once "./mvc/core/config.php";
require_once "./mvc/models/getRoom.php";
class updateRoom extends GetRoom
{
    public function like($room_id, $user_id){
        $check = $this -> CheckUserLike($room_id, $user_id);
        if($check){
            $action = $this -> RemoveLike($room_id, $user_id);
            $count = $this -> getCountlike($room_id);
            $data = [
                "action" => $action,
                "count" => $count
                ];
            return json_encode($data);
        }else{
            $action = $this -> AddLike($room_id, $user_id);
            $count = $this -> getCountlike($room_id);
            $data = [
                "action" => $action,
                "count" => $count
                ];
            return json_encode($data);
        }
    }
    public function AddLike($room_id, $user_id){
        $query = "INSERT INTO `room_like`(`user_id`, `room_id`) VALUES ('$user_id','$room_id')";
        $result = mysqli_query($this->connect, $query);
        if($result){
            return "add";
        }else{
            return false;
        }
    }
    public function RemoveLike($room_id, $user_id){
        $query = "DELETE FROM `room_like` WHERE `user_id` = $user_id AND `room_id` = $room_id";
        $result = mysqli_query($this->connect, $query);
        if($result){
            return "remove";
        }else{
            return false;
        }
    }
    public function CheckUserLike($room_id, $user_id){
        $query = "SELECT COUNT(`id_like`) AS id_like FROM `room_like` WHERE `user_id` = $user_id AND `room_id` = $room_id GROUP BY `id_like`";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $dataRoom =  $row["id_like"];
        }
        if($dataRoom < 1){
            return false;
        }else{
            return true;
        }
    }
    public function getCountlike($roomId){
        $query = "SELECT COUNT(*) as room_id FROM room_like WHERE room_id = $roomId GROUP BY room_id";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            $data= $row["room_id"];
        }
        return $data;
    }
    public function addComment($user_id, $room_id, $content){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $query = "INSERT INTO `comment`(`user_id`, `room_id`, `cmt_content`, `cmt_time`) VALUES ($user_id, $room_id,'$content','$time')";
        
        $data = array();
        $checkT = $this->checkCmt($user_id, $room_id);
        if($checkT >= 300){
            if($result = mysqli_query($this->connect, $query)){
                $idCmt = $this->connect->insert_id;
                $data = ["id" => $idCmt];
                return json_encode($data);
            }else{
                $data = ["id" => "false"];
                return json_encode($data);
            }
        }else{
            $data = ["time" => $checkT];
            return json_encode($data);
        }
    }
    public function addVote($user_id, $room_id, $vote){
        $data = array();
        $checkV = $this->checkVote($room_id, $user_id);
        if($checkV){
            $query = "UPDATE `vote` SET `vote_star`= $vote WHERE `id_vote` = $checkV";
        }else{
            $query = "INSERT INTO `vote`(`user_id`, `room_id`, `vote_star`) VALUES ($user_id,$room_id,$vote)";
        }
        if($result = mysqli_query($this->connect, $query)){
            $idVote = $this->connect->insert_id;
            if($idVote == 0){
                $idVote = $checkV;
            }
            $data = ["id" => $idVote];
            return json_encode($data);
        }else{
            $data = ["id" => "false"];
            return json_encode($data);
        }
    }
    public function addRepCmt($cmt_id, $user_id, $rep_content){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('Y-m-d H:i:s');
        $query = "INSERT INTO `rep_comment`( `id_cmt`, `id_user`, `rep_content`, `rep_time`) VALUES ($cmt_id, $user_id, '$rep_content', '$time')";
        if($result = mysqli_query($this->connect, $query)){
            $idRep = $this->connect->insert_id;
            $data = ["id" => $idRep];
            return json_encode($data);
        }else{
            $data = ["id" => "false"];
            return json_encode($data);
        }
    }
}