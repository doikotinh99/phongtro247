<?php
require_once "./mvc/core/controller.php";
class Ajax extends Controller
{
    public $getModel;

    public function __construct()
    {
        
    }
    // kiểm tra đăng nhập
    public function CheckLogin()
    {
        $this -> getModel = $this -> model("checkloginmodel");
        if (isset($_POST["email"])) {
            $user_email = $_POST["email"];
        }
        if (isset($_POST["pass"])) {
            $user_pass = $_POST["pass"];
        }
        $data = $this -> getModel->check($user_email, $user_pass);
        if($data){
            echo $data;
        }else{
            echo "false";
        }
        
    }
    // đăng xuất khỏi hệ thống
    public function logout(){
        unset($_SESSION['role_name']);
        if(!isset($_SESSION['role_name'])){
            unset($_SESSION['user_name']);
            if(!isset($_SESSION['user_name'])){
                echo "true";
            }else{
                echo "false";
            }
        }
        
    }
    // đăng ký tài khoản
    public function CheckRegis(){
        $this -> getModel = $this -> model("checkregistermodel");
        if (isset($_POST["json_regis"])) {
            $json_regis = $_POST["json_regis"];
        }
        $email = $this -> getModel->check_email($json_regis["email"]);
        if($email){
            $insert_user = $this -> getModel -> insert_user($json_regis["email"], password_hash($json_regis["pass"], PASSWORD_DEFAULT));
            if($insert_user){
                $user_id = $this -> getModel -> get_user_id($json_regis["email"]);
                $insert_infor = $this->getModel->insert_infor($user_id,$json_regis["first_name"], $json_regis["last_name"], $json_regis["birthday"], $json_regis["gender"]);
                if($insert_infor){
                    echo "true";
                    return;
                }else{
                    echo "Vui lòng kiểm tra lại thông tin";
                    return;
                }
            }else{
                echo "Vui lòng kiểm tra lại thông tin";
                return;
            }
        }
        echo "Email đã tồn tại trong hệ thống";
    }
    //thích phòng trọ
    public function LikeRoom(){
        $this -> getModel = $this -> model("updateRoom");
        if(isset($_SESSION['user_id'])){
            if(isset($_POST["room_id"])){
                $room_id = $_POST["room_id"];
            }
            $data = $this -> getModel->like($room_id, $_SESSION['user_id']);
            if($data){
                echo $data;
            }else{
                echo false;
            }
        }else{
            echo "login";
        }
    }
    // bình luận phòng trọ
    public function CmtRoom(){
        $this -> getModel = $this -> model("updateRoom");
        if(isset($_SESSION['user_id'])){
            if(isset($_POST["room_id"])){
                $room_id = $_POST["room_id"];
            }
            if(isset($_POST["content"])){
                $content = $_POST["content"];
            }
            $data = $this -> getModel->addComment($_SESSION['user_id'], $room_id, $content);
            echo $data;
        }else{
            echo "login";
        }
    }
    // đánh giá phòng trọ
    public function VoteRoom(){
        $this -> getModel = $this -> model("updateRoom");
        if(isset($_SESSION['user_id'])){
            if(isset($_POST["room_id"])){
                $room_id = $_POST["room_id"];
            }
            if(isset($_POST["vote"])){
                $vote = $_POST["vote"];
            }
            $data = $this -> getModel->addVote($_SESSION['user_id'], $room_id, $vote);
            echo $data;
        }else{
            echo "login";
        }
    }
    // trả lời comment
    public function repCmt(){
        $this -> getModel = $this -> model("updateRoom");
        if(isset($_SESSION['user_id'])){
            if(isset($_POST["cmt_id"])){
                $cmt_id = $_POST["cmt_id"];
            }
            if(isset($_POST["content"])){
                $content = $_POST["content"];
            }
            $data = $this -> getModel->addRepCmt($cmt_id, $_SESSION['user_id'], $content);
            echo $data;
        }else{
            echo "login";
        }
    }
    // lấy dữ liệu tài khoản admin
    public function adminAccount(){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        $this -> getModel = $this -> model("getDataAdmin");
        if($id == "admin_Account"){
            $idRole = 1;
        }
        if($id == "vendor_Account"){
            $idRole = 2;
        }
        if($id == "user_Account"){
            $idRole = 3;
        }
        $account = $this->getModel->getDataAccountAdmin($idRole);
        if(isset($_POST["status"])){
            $user_status = $_POST["status"];
            $account = $this->getModel->getDataSttAcc($idRole, $user_status);
        }
        if(isset($_POST["keyW"])){
            $keyW = $_POST["keyW"];
            $account = $this->getModel->getDataSearch($idRole, $keyW);
        }
        $main = ["admin_data_account"];
        $data = [
            "pages" => $main,
            "account" => $account
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    public function actAccount(){
        if(isset($_POST["user_id"])){
            $id = $_POST["user_id"];
        }
        if(isset($_POST["action"])){
            $act = $_POST["action"];
        }
        $this -> getModel = $this -> model("updateAdmin");
        $data = $this->getModel->actAccount($id, $act);
        echo $data;
    }
    public function resetPass(){
        if(isset($_POST["user_id"])){
            $id = $_POST["user_id"];
        }
        $this -> getModel = $this -> model("updateAdmin");
        $data = $this->getModel->resetPass($id);
        echo $data;
    }
    public function actPower(){
        if(isset($_POST["user_id"])){
            $id = $_POST["user_id"];
        }
        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }
        $this -> getModel = $this -> model("updateAdmin");
        $data = $this->getModel->actPower($id, $action);
        echo $data;
    }
    public function adminSearchAcc(){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
        }
        $this -> getModel = $this -> model("getDataAdmin");
        if($id == "admin_Account"){
            $idRole = 1;
        }
        if($id == "vendor_Account"){
            $idRole = 2;
        }
        if($id == "user_Account"){
            $idRole = 3;
        }
        if(isset($_POST["keyW"])){
            $keyW = $_POST["keyW"];
        }
        $account = $this->getModel->getDataSearch($idRole, $keyW);
        $main = ["adminAccount"];
        $data = [
            "pages" => $main,
            "account" => $account
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    // lấy dữ liệu phòng trọ
    public function adminRoom(){
        if(isset($_POST["status"])){
            $status = $_POST["status"];
        }
        $this -> getModel = $this -> model("getDataAdmin");
        $room = $this->getModel->getDataRoom($status);
        $main = ["admin_data_room"];
        $data = [
            "pages" => $main,
            "room" => $room
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    public function getRoomStatus(){
        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }
        $this -> getModel = $this -> model("getDataAdmin");
        if($action == "active"){
            $room = $this->getModel->getDataRoomActive();
        }
        if($action == "time"){
            $room = $this->getModel->getDataRoomTime();
        }
        if($action == "waiting"){
            $room = $this->getModel->getDataRoomWaiting();
        }
        $main = ["admin_data_room"];
        $data = [
            "pages" => $main,
            "room" => $room
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    // xử lý phòng trọ
    public function actRoom(){
        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }
        if(isset($_POST["id_room"])){
            $id_room = $_POST["id_room"];
        }
        if(isset($_POST["AddTime"])){
            $add_time = $_POST["AddTime"];
        }
        $this -> getModel = $this -> model("updateAdmin");
        if($action == "ban"){
            $room = $this->getModel->banRoom($id_room);
        }
        if($action == "active"){
            $room = $this->getModel->activeRoom($id_room);
        }
        if($action == "extend"){
            $room = $this->getModel->extendRoom($id_room, $add_time);
        }
        echo $room;
    }
    // tìm kiếm phòng trọ
    public function adminSearchRoom(){
        if(isset($_POST["status"])){
            $status = $_POST["status"];
        }
        if(isset($_POST["keyW"])){
            $keyW = $_POST["keyW"];
        }
        $this -> getModel = $this -> model("getDataAdmin");
        $room = $this->getModel->getDataSearchRoom($status, $keyW);
        $main = ["adminRoom"];
        $data = [
            "pages" => $main,
            "room" => $room
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    // chủ trọ tìm phòng
    public function searchRoomVendor(){
        if(isset($_POST["keyW"])){
            $keyW = $_POST["keyW"];
        }
        $this -> getModel = $this -> model("getDataVendor");
        $room = $this->getModel->getDataSearch($keyW);
        $main = ["vendor_room"];
        $data = [
            "pages" => $main,
            "dataRoom" => $room
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    public function actRoomVendor(){
        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }
        $this -> getModel = $this -> model("getDataVendor");
        if($action == "all"){
            $room = $this->getModel->getDataRoom();
        }else{
            $room = $this->getModel->actDataRoom($action);
        }
        
        $main = ["vendor_room"];
        $data = [
            "pages" => $main,
            "dataRoom" => $room
        ];
        $data = json_encode($data);
        $this->view("viewajax", ["data" => $data]);
    }
    public function getDistrictPost(){
        if(isset($_POST["code"])){
            $code = $_POST["code"];
        }
        $district = file_get_contents('public/upload/dataJSON/quan_huyen.json');
        $district = json_decode($district);
        $data = array();
        foreach($district as $value){
            if($value->parent_code == $code){
                $value = (array)$value;
                $data[] = $value;
            }
        }
        echo json_encode($data);
    }
    public function getwardPost(){
        if(isset($_POST["code"])){
            $code = $_POST["code"];
        }
        $ward = file_get_contents('public/upload/dataJSON/xa_phuong.json');
        $ward = json_decode($ward);
        $data = array();
        foreach($ward as $value){
            if($value->parent_code == $code){
                $value = (array)$value;
                $data[] = $value;
            }
        }
        echo json_encode($data);
    }
    public function addDataRoom(){
        if(isset($_POST["data"])){
            $data = $_POST["data"];
        }
        $this -> getModel = $this -> model("updateVendor");
        $act = $this -> getModel -> addRoom($data);
    }
    public function upImage(){
        $name = array();
        $tmp_name = array();
        
        foreach ($_FILES["file"]["name"] as $file) {
        $name[] = $file;
            
        }
        foreach ($_FILES["file"]["tmp_name"] as $file){
        $tmp_name[] = $file;
        }
        $err = 0;
        for ($i =0 ; $i < count($name); $i++){
            $temp = preg_split("/[\/\\\\]+/", $name[$i]);
            $filename = $temp[count($temp)-1];
            $upload_dir = "public/upload/image/";
            $upload_file = $upload_dir . $filename;
            if (move_uploaded_file($tmp_name[$i], $upload_file) ){
                $err++;
            }else
            {
                echo "<script>history.back()</script>";
                break;
                
            } 
        }
        if($err == count($name)){
            echo "Thành công<br>";
            echo '<a href="/vendor">Quay lại trang quản trị</a>';
        }
    }
    public function rePass(){
        if(isset($_POST["ipPassOld"])){
            $ipPassOld = $_POST["ipPassOld"];
        }
        if(isset($_POST["ipPassNew1"])){
            $ipPassNew1 = $_POST["ipPassNew1"];
        }
        $this -> getModel = $this -> model("updateIndex");
        $room = $this->getModel->updateAccount($ipPassNew1, $ipPassOld);
    }
    
}
