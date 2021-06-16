<?php 
    // xử lý data nhận được từ controller chuyển về dạng array
    $room = json_decode($data["room"]);
    $room = (array)$room[0];
    $infor = json_decode($data["infor"]);
    $infor = (array)$infor[0];
    $voteCount = $data["voteCount"];
    $voteStar = json_decode($data["voteStar"]);
    $voteStar = (array)$voteStar;
    $voteMedium = round(($voteStar["v1s"]*1 + $voteStar["v2s"]*2 + $voteStar["v3s"]*3 + $voteStar["v4s"]*4 + $voteStar["v5s"]*5)/$voteCount, 1);
    $comment = json_decode($data["comment"]);
    $maxVote = 0;
    foreach($voteStar as $value){
        if($value > $maxVote){
            $maxVote = $value;
        }
    }
    $perVote = array();
    foreach($voteStar as $key => $value){
        $perVote[$key] = ($value/$maxVote)*100;
    }
?>
<section class="mt-2">
    <ul class="nav nav-tabs px-2" id="myTab">
        <li class="nav-item">
            <a href="#dtDescribe" class="nav-link text-colors" data-toggle="tab">Mô tả</a>
        </li>
        <li class="nav-item">
            <a href="#dtEvaluate" class="nav-link text-colors" data-toggle="tab">Hỏi đáp & đánh giá</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade px-2" id="dtDescribe">
            <h4 class="mt-2"><?php echo $room["room_title"]; ?></h4>
            <?php echo $infor["infor_post"]; ?>
        </div>
        <div class="tab-pane fade" id="dtEvaluate">
            <div id="fontVote">
                <h4 class="mt-2 text-truncate w-100">Hỏi đáp & đánh giá về <?php echo $room["room_title"]; ?></h4>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 border p-2 pt-5 text-center">
                        <p class="text-colors mb-1"><?php echo $voteMedium; ?> <i class="fas fa-star"></i></p>
                        <p><?php echo $voteCount; ?> đánh giá</p>
                    </div>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-6 border p-2">
                        <div class="w-100 d-flex mb-2">
                            <span class="text-muted form_vote_star">5 sao</span>
                            <div class="form_vote_line  ">
                                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                                <span style="width:<?php echo $perVote["v5s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
                            </div>
                            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v5s"] ?></span>
                        </div>
                        <div class="w-100 d-flex mb-2">
                            <span class="text-muted form_vote_star">4 sao</span>
                            <div class="form_vote_line  ">
                                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                                <span style="width:<?php echo $perVote["v4s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
                            </div>
                            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v4s"] ?></span>
                        </div>
                        <div class="w-100 d-flex mb-2">
                            <span class="text-muted form_vote_star">3 sao</span>
                            <div class="form_vote_line  ">
                                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                                <span style="width:<?php echo $perVote["v3s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
                            </div>
                            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v3s"] ?></span>
                        </div>
                        <div class="w-100 d-flex mb-2">
                            <span class="text-muted form_vote_star">2 sao</span>
                            <div class="form_vote_line  ">
                                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                                <span style="width:<?php echo $perVote["v2s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
                            </div>
                            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v2s"] ?></span>
                        </div>
                        <div class="w-100 d-flex mb-2">
                            <span class="text-muted form_vote_star">1 sao</span>
                            <div class="form_vote_line  ">
                                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                                <span style="width:<?php echo $perVote["v1s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
                            </div>
                            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v1s"] ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-3 col-lg-3 border p-2 pt-5 text-center">
                        <p class="mb-1">Đánh giá ngay</p>
                        <button id="btn_comment" class="btn_comment btn btn-colorbg">Đánh giá</button>
                    </div>
                </div>
            </div>
            <div  id="form_comment" class="w-100 mt-1 rounded form_comment">
                <div class="px-2" id="ReviewVote">
                    <p class="mb-1 h4">Đánh giá <?php echo $room["room_title"]; ?></p>
                    <p id="formVote" class="mb-1 text-colors text-center text-2">
                        <span class="text-2 starFas"><i class="fas fa-star"></i></span>
                        <span class="text-2 starFar d-none"><i class="far fa-star"></i></span>
                        <span class="text-2 starFas"><i class="fas fa-star"></i></span>
                        <span class="text-2 starFar d-none"><i class="far fa-star"></i></span>
                        <span class="text-2 starFas"><i class="fas fa-star"></i></span>
                        <span class="text-2 starFar d-none"><i class="far fa-star"></i></span>
                        <span class="text-2 starFas"><i class="fas fa-star"></i></span>
                        <span class="text-2 starFar d-none"><i class="far fa-star"></i></span>
                        <span class="text-2 starFas"><i class="fas fa-star"></i></span>
                        <span class="text-2 starFar d-none"><i class="far fa-star"></i></span>
                    </p>
                    <div class="w-100 text-right">
                        <button id="btnVote" class="btn btn-colormbg">Đánh giá</button>
                    </div>
                </div>
                
                
            </div>
            <div class="px-2 border p-2 mt-2">
                <h4 class="mt-1">Bình luận về <?php echo $room["room_title"]; ?></h4>
                <form class="was-validated">
                    <div class="mb-3">
                            <textarea class="form-control is-invalid boxCmt_<?php echo $room["id_room"]; ?>" id="boxCmt" placeholder="Mời bạn để lại đánh giá,bình luận (Vui lòng nhập tiếng việt có dấu)" required></textarea>
                    </div>
                </form>
                <div class="w-100 text-right">
                    <button id="btnSubCmt" class="btn btn-colormbg">Gửi</button>
                </div>
            </div>
            <div id="listCmtRoom" class="mt-2">
                <?php 
                    foreach($comment as $value){
                ?>
                <!--comment user-->
                <div class="w-100 d-flex mb-2">
                    <span class="avatar"><?php echo $value->infor_lastname[0]; ?></span>
                    <div class="cmt_info">
                        <div class="w-100">
                            <span class="font-weight-bold d-inline-block py-1"><?php echo $value->infor_firstname." ".$value->infor_lastname; ?></span>
                            <span class="
                                <?php 
                                    if($value->role_name == "admin"){
                                        echo "bg-primary";
                                    }
                                    if($value->role_name == "vendor" && $value->user_id == $data["idVendor"]){
                                        echo "bg-colors";
                                    }
                                ?> px-2 py-1 rounded ml-1 text-white">
                                <?php 
                                    if($value->role_name != "user" && $value->role_name != "vendor"){
                                        echo "Quản trị viên";
                                    }
                                    if($value->role_name == "vendor" && $value->user_id == $data["idVendor"]){
                                        echo "Chủ phòng";
                                    }
                                ?>
                            </span>
                            <span class="float-right font-weight-norma text-colors">
                                <?php
                                    for($i = 0; $i < $value->vote; $i++){
                                ?> 
                                <i class="fas fa-star"></i>
                                <?php }?>
                            </span>
                        </div>
                        <div class="w-100">
                            <p class="text-justify mb-1"><?php echo $value->cmt_content; ?> </p>
                        </div>
                        <div class="w-100 text-muted">
                            <!--<span type="button">-->
                            <!--    <small class="text-colors">-->
                            <!--    <i class="fas fa-heart"></i>-->
                            <!--    </small>-->
                            <!--    <small>10 thích &nbsp;</small>-->
                            <!--</span>-->
                            <small onclick="rep_cmt('form_repCmt<?php echo $value->id_comment; ?>')" type="button"><i class="fas fa-reply"></i> trả lời &nbsp;</small>
                            <small><?php echo $value->cmt_time; ?> </small>
                        </div>
                        <div  id="form_repCmt<?php echo $value->id_comment; ?>" class="w-100 my-1 rounded form_comment">
                            <form class="was-validated">
                                <div class="mb-3">
                                        <textarea class="form-control is-invalid" id="box_repCmt<?php echo $value->id_comment; ?>" placeholder="Mời bạn để lại đánh giá,bình luận (Vui lòng nhập tiếng việt có dấu)" required></textarea>
                                </div>
                            </form>
                            <div class="w-100 text-right">
                                <button id="btn_cmt_cls" type="button" class="btn text-colors" onclick="rep_cmt('form_repCmt<?php echo $value->id_comment; ?>')"><i class="fas fa-times"></i> Hủy</button>
                                <button onclick="repCmt(<?php echo $value->id_comment; ?>)" class="btn btn-colormbg">Trả lời</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--trả lời comment-->
                <div id="BoxRepCmt<?php echo $value->id_comment; ?>">
                    <?php 
                        foreach($value->repComment as $value1){
                    ?>
                    <div class="d-flex mb-2 ml-5">
                        <span class="avatar"><?php echo $value1->infor_lastname[0]; ?></span>
                        <div class="cmt_info">
                            <div class="w-100">
                                <span class="font-weight-bold d-inline-block py-1"><?php echo $value1->infor_firstname." ".$value1->infor_lastname; ?></span>
                                <span class="
                                    <?php 
                                        if($value1->role_name == "admin"){
                                            echo "bg-primary";
                                        }
                                        if($value1->role_name == "vendor" && $value1->user_id == $data["idVendor"]){
                                            echo "bg-colors";
                                        }
                                    ?> px-2 py-1 rounded ml-1 text-white">
                                    <?php 
                                        if($value1->role_name != "user" && $value1->role_name != "vendor"){
                                            echo "Quản trị viên";
                                        }
                                        if($value1->role_name == "vendor" && $value1->user_id == $data["idVendor"]){
                                            echo "Chủ phòng";
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="w-100">
                                <p class="text-justify mb-1"><?php echo $value1->rep_content; ?></p>
                            </div>
                            <div class="w-100 text-muted">
                                <small><?php echo $value1->rep_time; ?></small>
                            </div>
                        </div>
                            
                        
                    </div>
                    <?php
                        }
                    ?>
                    
                    
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
</section>