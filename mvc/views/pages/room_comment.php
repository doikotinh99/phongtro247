<?php 
    // xử lý data nhận được từ controller chuyển về dạng array
    $NewCmt = json_decode($data["NewComment"]);
    $NewCmt = $NewCmt[0];
    $like = json_decode($data["dataLike"]);
    // $like = $like[0];
    echo "data = <br>";
    print_r($like);
?>
<div class="w-100 d-flex mb-2">
    <span class="avatar"><?php echo $NewCmt->infor_lastname[0]; ?></span>
    <div class="cmt_info">
        <div class="w-100">
            <span class="font-weight-bold d-inline-block py-1"><?php echo $NewCmt->infor_firstname." ".$NewCmt->infor_lastname; ?></span>
            <span class="
                <?php 
                    if($NewCmt->role_name == "admin"){
                        echo "bg-primary";
                    }
                    if($NewCmt->role_name == "vendor" && $NewCmt->user_id == $data["idVendor"]){
                        echo "bg-colors";
                    }
                ?> px-2 py-1 rounded ml-1 text-white">
                <?php 
                    if($NewCmt->role_name != "user" && $NewCmt->role_name != "vendor"){
                        echo "Quản trị viên";
                    }
                    if($NewCmt->role_name == "vendor" && $NewCmt->user_id == $data["idVendor"]){
                        echo "Chủ phòng";
                    }
                ?>
            </span>
            <span class="float-right font-weight-norma text-colors">
                <?php
                    for($i = 0; $i < $NewCmt->vote; $i++){
                ?> 
                <i class="fas fa-star"></i>
                <?php }?>
            </span>
        </div>
        <div class="w-100">
            <p class="text-justify mb-1"><?php echo $NewCmt->cmt_content; ?> </p>
        </div>
        <div class="w-100 text-muted">
            <!--<span type="button">-->
            <!--    <small class="text-colors">-->
            <!--    <i class="fas fa-heart"></i>-->
            <!--    </small>-->
            <!--    <small>10 thích &nbsp;</small>-->
            <!--</span>-->
            <small onclick="rep_cmt('form_repCmt<?php echo $NewCmt->id_comment; ?>')" type="button"><i class="fas fa-reply"></i> trả lời &nbsp;</small>
            <small><?php echo $NewCmt->cmt_time; ?> </small>
        </div>
        <div  id="form_repCmt<?php echo $NewCmt->id_comment; ?>" class="w-100 my-1 rounded form_comment">
            <form class="was-validated">
                <div class="mb-3">
                        <textarea class="form-control is-invalid" id="box_repCmt<?php echo $NewCmt->id_comment; ?>" placeholder="Mời bạn để lại đánh giá,bình luận (Vui lòng nhập tiếng việt có dấu)" required></textarea>
                </div>
            </form>
            <div class="w-100 text-right">
                <button id="btn_cmt_cls" type="button" class="btn text-colors" onclick="rep_cmt('form_repCmt<?php echo $NewCmt->id_comment; ?>')"><i class="fas fa-times"></i> Hủy</button>
                <button class="btn btn-colormbg">Trả lời</button>
            </div>
        </div>
    </div>
</div>