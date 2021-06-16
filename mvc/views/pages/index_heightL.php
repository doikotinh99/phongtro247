<?php
    $dataRoom = json_decode($data["dataRoom"]);
?>
<!--Bài đăng mới nhất-->
<div class="d-flex w-100">
    <div class="w-50">
        <h3 class="main_title">Bài đăng mới nhất</h3>
    </div>
    <div class="w-50 text-right py-2">
        <a class="ml-auto text-colorbs text-decoration-none" href="##">
            <span>Xem thêm</span>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
            </svg>
        </a>
    </div>
</div>
<div class="row main_list_card">
    
    <?php 
        foreach($dataRoom as $value){
        $urlImage =  explode(",", filter_var(trim($value->room_image, ",")));
    ?>
    <a class="text-decoration-none text-dark d-block col-12 col-sm-12 col-md-4 col-lg-4 mb-3" href="./phongtro/chitietphongtro/<?php echo $value->id_room; ?>">
        <div class="card mx-2">
            <div class="row">
                <div class="col-5 col-sm-5 col-md-12 col-lg-12">
                    <img src="./public/upload/image/<?php echo $urlImage[0]; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body col-7 col-sm-7 col-md-12 col-lg-12 py-md-0">
                    <p class="card-text mb-1 ellipsis-1 text-dark"><?php echo $value->room_title; ?></p>
                    <p class="mb-1">
                        <span>Diện tích: </span>
                        <span class="text-muted"><?php echo $value->infor_areage;?>m<sup>2</sup></span>
                    </p>
                    <p class="mb-0">Giá: <span class="font-weight-bold text-danger"><?php echo $value->infor_price; ?></span></p>
                    <p class="">
                        <span>Đánh giá: </span>
                        <span class="text-colorl"><?php 
                            $value->Vst = (Array)$value->Vst;
                            if($value->Cvote === 0){
                                echo "5";
                            }else{
                                $voteMedium = ($value->Vst["v1s"]*1 + $value->Vst["v2s"]*2 + $value->Vst["v3s"]*3 + $value->Vst["v4s"]*4 + $value->Vst["v5s"]*5)/$value->Cvote;
                                echo round($voteMedium, 1);
                            }
                             
                        ?>/5</span>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill text-colorl" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </p>
                </div>
            </div>
            <div class="card-footer text-muted text-left">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
                  <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <span><?php 
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $timeNow = date('Y-m-d H:i:s');
                $timeInt = strtotime($timeNow) - strtotime($value->room_time);
                if($timeInt < 60){
                    echo $timeInt." giây trước";
                }else if($timeInt < 3600){
                    echo round($timeInt/60)." phút trước";
                }else if($timeInt < 86400){
                    echo round($timeInt/3600)." giờ trước";
                }else if($timeInt < 604800){
                    echo round($timeInt/86400)." ngày trước";
                }else if($timeInt < 2592000){
                    echo round($timeInt/604800)." tuần trước";
                }else if($timeInt < 31536000){
                    echo round($timeInt/2592000)." tháng trước";
                }else{
                    echo round($timeInt/31536000)." năm trước";
                }
                ?></span> - <span>Hà Nội</span>
            </div>
        </div>
    </a>       
    <?php
        }
    ?>
    <div class="w-100 text-center mb-3">
        <a class="btn btn-colorbg" href="##">Xem thêm</a>
    </div>
    
    
</div>