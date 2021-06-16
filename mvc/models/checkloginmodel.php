<?php
require_once "./mvc/core/config.php";
class CheckLoginModel extends Config
{
    public function check($user_email, $user_pass){
        $query = "select * from user";
        $result = mysqli_query($this->connect, $query);
        while ($row = mysqli_fetch_array($result)) {
            if($user_email == $row["user_email"] && password_verify($user_pass, $row["user_pass"])){
                $id_role = $row["id_role"];
                $user_id = $row["user_id"];
                $_SESSION['user_id'] = $user_id;
                $sql_infor = "SELECT * FROM `infor` WHERE `infor_id` = '$user_id'";
                $result_infor = mysqli_query($this->connect, $sql_infor);
                while($row_infor = mysqli_fetch_array($result_infor)){
                    $_SESSION['user_name'] = $row_infor["infor_lastname"];
                }
                $sql_role = "SELECT * FROM `role` WHERE `role_id` = '$id_role'";
                $result_role = mysqli_query($this->connect, $sql_role);
                while($row_role = mysqli_fetch_array($result_role)){
                    $_SESSION['role_name'] = $row_role["role_name"];
                    return $row_role["role_name"];
                }
                
            }
        }
        return false;
    }

    
}
