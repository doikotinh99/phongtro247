<?php
require_once "./mvc/models/getDataVendor.php";
class updateVendor extends getDataVendor
{
    public function addRoom($data){
        $data = json_decode($data);
        $this -> connect -> begin_transaction();
        $this -> connect -> autocommit(false);
        $provinc = file_get_contents('./public/upload/dataJSON/tinh_tp.json');
        $provinc = json_decode($provinc);
        foreach($provinc as $value){
            if($value->code == $data->postProvinc){
                $data->postProvinc = $value->name;
            }
            
        }
        $ward = file_get_contents('public/upload/dataJSON/xa_phuong.json');
        $ward = json_decode($ward);
        foreach($ward as $value){
            if($value->code == $data->postWard){
                $data->postWard = $value->name;
            }
        }
        $district = file_get_contents('public/upload/dataJSON/quan_huyen.json');
        $district = json_decode($district);
        foreach($district as $value){
            if($value->code == $data->postDistrict){
                $data->postDistrict = $value->name;
            }
        }
        $list_image = "";
        foreach($data->postImage as $value){
            $list_image = $list_image.",".$value;
        }
        $list_image = substr($list_image, 1, strlen($list_image) - 1);
        try{
            $query1 = "INSERT INTO `address`(`add_apart`, `add_wards`, `add_district`, `add_province`) VALUES ('$data->postApart', '$data->postWard', '$data->postDistrict', '$data->postProvinc')";
            mysqli_query($this -> connect, $query1);
            $id_add = $this -> connect -> insert_id; 
            $id_vendor = $_SESSION['user_id'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timeNow = date('Y-m-d H:i:s');
            $query2 = "INSERT INTO `room`( `room_title`, `add_id`, `room_image`, `id_vendor`, `room_time`, `room_countday`, `room_status`) VALUES ('$data->RoomName', $id_add, '$list_image', '$id_vendor', '$timeNow', '$data->postTimeend', '0')";
            mysqli_query($this -> connect, $query2);
            $id_room = $this -> connect -> insert_id; 
            $query3 = "INSERT INTO `info_room`(`id_infor`, `infor_category`, `infor_count`, `infor_price`, `infor_elect`, `infor_water`, `infor_closed`, `infor_areage`, `infor_detailRoom`, `infor_airCo`, `infor_heater`, `infor_fridge`, `infor_WM`, `infor_bed`, `infor_wardrobe`, `infor_nearHost`, `infor_time`, `infor_note`, `infor_post`) VALUES ($id_room,'$data->postCategory','$data->postCount','$data->postPrice','$data->postElect','$data->postWater','$data->postClosed','$data->postAreage','$data->postDetail','$data->postAirCo','$data->postHeater','$data->postFridge','$data->postWM','$data->postBed','$data->postWardrobe','$data->postNearHost','$data->postTime','$data->postNote', '$data->post_posts')";
            mysqli_query($this -> connect, $query3);
            $this -> connect -> commit();
            return "true";
        }catch(Exception $e){
            $this -> connect -> rollback();
            return "false";
        }
    
    }
}