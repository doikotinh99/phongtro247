<?php
require_once "./mvc/core/config.php";
class CheckRegisterModel extends Config
{
    public function insert_user($email, $pass){
        $query = "INSERT INTO `user`(`user_email`, `user_pass`, `id_role`, `user_status`) VALUES ('$email', '$pass', '3', '1')";
        if ($this -> connect -> query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function insert_infor($user_id,$first_name, $last_name, $birthday, $gender){
        $query = "INSERT INTO `infor`(`infor_id`, `infor_firstname`, `infor_lastname`, `infor_birth`, `infor_gender`) VALUES ('$user_id','$first_name', '$last_name', '$birthday', '$gender')";
        if ($this -> connect -> query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function get_user_id($email){
        $query = "select * from user where user_email = '$email'";
        $result = mysqli_query($this->connect, $query);
        $user_id = mysqli_fetch_array($result)["user_id"];
        return $user_id;
    }
    public function check_email($email){
        $query = "select * from user";
        $result = mysqli_query($this->connect, $query);
        while ($row = mysqli_fetch_array($result)) {
            if($email == $row["user_email"]){
                return false;
            }
        }
        return true;
    }

    
}
