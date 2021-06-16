<?php
    $dataRoom = json_decode($data["dataRoom"]);
?>
<div class="main_list_card">
    <?php 
        foreach($dataRoom as $value){
        $urlImage =  explode(",", filter_var(trim($value->room_image, ",")));
    ?>
    <div class="card mb-2">
        <div class="row">
            <div class="owl_crs_card">
                <?php 
                  if($value->room_status == 2){
                      echo '<span class="vote bg-danger">Vi phạm</span>';
                  }
                  if($value->room_status == 0){
                      echo '<span class="vote bg-secondary">Chờ xử lý</span>';
                  }
                  date_default_timezone_set('Asia/Ho_Chi_Minh');
                  $timeNow = date('Y-m-d H:i:s');
                  $timeInts = strtotime($timeNow) - strtotime($value->room_timeend);
                  if($value->room_status == 1 && $timeInts > 0){
                      echo '<span class="vote bg-warning">Hết hạn</span>';
                  }
                  if($value->room_status == 1 && $timeInts < 0){
                      if($value->infor_count <= 0){
                          echo '<span class="vote bg-dark">Hết phòng</span>';
                      }
                      if($value->infor_count > 0){
                          echo '<span class="vote bg-success">Hoạt động</span>';
                      }
                      
                  }
                  
                ?>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3">
                <img src="./public/upload/image/<?php echo $urlImage[0]; ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body col-9 col-sm-9 col-md-9 col-lg-9 py-md-0">
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
        <div class="dropdown abs-top-right">
            <a type="button" class="text-colors text-1-1 px-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
            <div class="dropdown-menu bg-colors" aria-labelledby="dropdownMenuButton">
                <a id="allRoom" class="dropdown-item" target="_blank" href="phongtro/chitietphongtro/<?php echo $value->id_room; ?>">Xem phòng</a>
                <a id="activeRoom" class="dropdown-item" href="#">Chỉnh sửa</a>
                <?php
                    if($value->room_status == 1 && $timeInts > 0){
                ?>
                    <a class="dropdown-item" onclick="actRoom(4, 'extend', 1, 7)" href="#">Gia hạn 7 ngày</a>
                    <a class="dropdown-item" onclick="actRoom(4, 'extend', 1, 30)" href="#">Gia hạn 30 ngày</a>
                    <a class="dropdown-item" onclick="actRoom(4, 'extend', 1, 90)" href="#">Gia hạn 90 ngày</a>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </div>     
    <?php
        }
    ?>
    
    
</div>