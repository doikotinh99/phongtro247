<?php 
    $dataRep = json_decode($data["dataNewRepCmt"]);
    $dataRep = (array)$dataRep[0];
?>
<div class="d-flex mb-2 ml-5">
    <span class="avatar"><?php echo $dataRep["infor_lastname"][0]; ?></span>
    <div class="cmt_info">
        <div class="w-100">
            <span class="font-weight-bold d-inline-block py-1"><?php echo $dataRep["infor_firstname"]." ".$dataRep["infor_lastname"]; ?></span>
            <span class="
                <?php 
                    if($dataRep["role_name"] == "admin"){
                        echo "bg-primary";
                    }
                    if($dataRep["role_name"] == "vendor" && $dataRep["user_id"] == $data["idVendor"]){
                        echo "bg-colors";
                    }
                ?> px-2 py-1 rounded ml-1 text-white">
                <?php 
                    if($dataRep["role_name"] != "user" && $dataRep["role_name"] != "vendor"){
                        echo "Quản trị viên";
                    }
                    if($dataRep["role_name"] == "vendor" && $dataRep["user_id"] == $data["idVendor"]){
                        echo "Chủ phòng";
                    }
                ?>
            </span>
        </div>
        <div class="w-100">
            <p class="text-justify mb-1"><?php echo $dataRep["rep_content"]; ?></p>
        </div>
        <div class="w-100 text-muted">
            <small><?php echo $dataRep["rep_time"]; ?></small>
        </div>
    </div>
        
    
</div>