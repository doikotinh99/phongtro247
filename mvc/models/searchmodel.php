<?php
class searchModel extends Config{
    public $query_searchRoom;
    public $array_searchRoom = array();
    public $result_searchRoom;
    public $row_searchRoom;
    
    public function searchRoom($tinh, $huyen, $xa, $gia, $dientich){
        $query_searchRoom = "select * from room r, info_room ir, address a where 1=1
and r.id_room = ir.id_infor
and r.id_room = a.id_add
and (
    ir.infor_price like '%$gia%'
    or a.add_province like '%$tinh%'
    or a.add_district like '%$huyen%'
    or a.add_wards like '%$xa%'
    or ir.infor_areage like '%$dientich%'
    )";
    
    $result_searcgRoom = mysqli_query($this ->connect, $query_serchRoom);
    $row_searchRoom  = mysqli_fetch_array($result_searcgRoom);
        $array_searchRoom[] = $row_searchRoom;
        
    return json_encode($array_searchRoom);
    
    }
}
?>