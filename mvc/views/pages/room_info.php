<?php 
    // xử lý data nhận được từ controller chuyển về dạng array
    $room = json_decode($data["room"]);
    $room = (array)$room[0];
    $infor = json_decode($data["infor"]);
    $infor = (array)$infor[0];
    $vendor = json_decode($data["vendor"]);
    $vendor = (array)$vendor[0];
    $countLike = $data["countLike"];
    $voteCount = $data["voteCount"];
    $voteStar = json_decode($data["voteStar"]);
    $voteStar = (array)$voteStar;
    $voteMedium = round(($voteStar["v1s"]*1 + $voteStar["v2s"]*2 + $voteStar["v3s"]*3 + $voteStar["v4s"]*4 + $voteStar["v5s"]*5)/$voteCount, 1);
    $likeU = $data["likeU"];
?>
<!-- Modal -->
<div class="modal fade" id="ReadMoreInfo" tabindex="-1" aria-labelledby="ReadMoreInfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết phòng trọ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Giá:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_price"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Điện:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_elect"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">nước:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_water"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Loại phòng:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_category"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Phòng trống:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_count"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Diện tích:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_areage"] ?> m<sup>2</sup></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Nội thất:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_detailRoom"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Điều hòa:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_airCo"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Bình nóng lạnh:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_heater"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Tủ lạnh:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_fridge"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Máy giặt:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_WM"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Giường:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_bed"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Tủ:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_wardrobe"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Chung chủ:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_nearHost"]; ?></p>
        </div>
        <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
            <p class="mb-0 w-50">Giờ giấc:</p>
            <p class="mb-0 w-50"><?php echo $infor["infor_time"]; ?></p>
        </div>
        <div class="p-3">
            <p class="mb-0">Ghi chú</p>
            <hr class="my-1">
            <p><?php echo $infor["infor_note"]; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--thông tin phòng trọ-->
<section>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 pr-md-7 owl_carowsel_custorm">
            <div class="owl_crs_card">
                <span class="vote bg-colors"><?php echo $voteMedium; ?> <i class="fas fa-star"></i></span>
                <span id="likeRoom" class="like bg-colorl">
                    <span id="countLikeRoom" class="p-0"><?php echo $countLike;?></span>
                    <i class="fas fa-heart <?php if($likeU){echo "text-danger";} ?>"></i>
                </span>
                
            </div>
            <div class="owl-carousel owl-theme w-100">
                <?php 
                    if (isset($room["room_image"])) {
                        $urlImage =  explode(",", filter_var(trim($room["room_image"], ",")));
                        foreach ($urlImage as $value) {
                ?>
                <div class="item"> <img class="w-100 border border-warning" height="300px" src="/public/upload/image/<?php echo $value; ?>" ></div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 pl-md-2">
            <h5 class="font-weight-bold text-colorl text-truncate w-100" title="<?php echo $room["room_title"]; ?>"><?php echo $room["room_title"]; ?></h5>
            
                
            <p class="text-secondary mb-0 text-truncate">
                <small><i class="fas fa-map-marker-alt"></i> 
                <?php 
                    echo $vendor["add_apart"].", ".$vendor["add_wards"].", ".$vendor["add_district"].", ".$vendor["add_province"];
                ?>
                </small>
            </p>
            <p class="font-weight-bold text-1-1 text-colors mb-0">
                <?php echo $infor["infor_price"]; ?>
            </p>
            <p class="font-weight-bold text-colorl mb-0"> </p>
            <hr class="mt-1 mb-2">
            <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
                <p class="mb-0 w-50">Diện tích:</p>
                <p class="mb-0 w-50"><?php echo $infor["infor_areage"] ?> m<sup>2</sup></p>
            </div>
            <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
                <p class="mb-0 w-50">Chung chủ:</p>
                <p class="mb-0 w-50"><?php echo $infor["infor_nearHost"]; ?></p>
            </div>
            <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
                <p class="mb-0 w-50">Giờ giấc:</p>
                <p class="mb-0 w-50"><?php echo $infor["infor_time"]; ?></p>
            </div>
            <div class="w-100 d-flex border-bottom inf_room_all px-3 py-2">
                <p class="mb-0 w-50">Khép kín:</p>
                <p class="mb-0 w-50"><?php echo $infor["infor_closed"]; ?></p>
            </div>
            <div class="w-100 text-center mt-1">
                <span type="button" class="mb-1 text-colorl" data-toggle="modal" data-target="#ReadMoreInfo">Chi tiết</span>
            </div>
        </div>
        
    </div>
</section>