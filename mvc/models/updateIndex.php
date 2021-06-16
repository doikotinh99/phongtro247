<?php
require_once "./mvc/models/GetIndex.php";
class updateIndex extends GetIndex
{
    public function updateAccount($pass, $passN){
        $user_id = $_SESSION['user_id'];
        $check = $this->checkPass($pass);
        if($check){
            $pas = password_hash($json_regis["pass"], PASSWORD_DEFAULT);
            $query = "UPDATE `user` SET `user_pass` = $passN WHERE `user_id` = $user_id";
        }
        
        
    }
    public function checkPass($pass){
        $user_id = $_SESSION['user_id'];
        $query = "SELECT user_pass FROM user WHERE user_id = $user_id";
        $result = mysqli_query($this->connect, $query);
        while ($row  = mysqli_fetch_array($result)) {
            if(password_verify($pass, $row["user_pass"])){
                return true;
            }
        }
        return false;
        
    }
}