<?php 
    $RoomLike = $data["RoomLike"];
    $RoomLike = json_decode($RoomLike);
?>
<!-- Modal box search mobile -->
<div class="modal fade" id="modal_dk_search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Điều kiện</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>
<!--end-->
<!--box search mobile-->
<section class="search_mobile">
    <div>
        <h3 class="text-left p-2 bg-colors">Tìm phòng nhanh chóng</h3>
        <button class="btn_close_search_mobile btn btn-colorbgw p-1 rounded-0">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
            </svg>
        </button>
        <div class="px-2 mb-2">
            <input class="form-control rounded-0 box_search_mobile_header mb-1" type="search" placeholder="Từ khóa cần tìm" aria-label="Search" selected>
            <div>
                <button class="btn bg-colors w-100">Tìm Kiếm</button>
            </div>
        </div>
    </div>
    <div class="bsmb_slt">
        <div class="mb-1">
            <nav class="navbar p-2 bg-colorl btn_list_bs_mb collapsed" data-toggle="collapse" data-target="#list_dk_bs_mb" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <h5 class="m-0 w-100 mb-1">
                    <span>Điều kiện</span>
                    <span class="float-right btn_dk_bs_mb">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </h5>
            </nav>
            <div class="collapse" id="list_dk_bs_mb">
                <div class="bg-colorl p-2">
                    <div class="row">
                        <?php 
                            for($i = 0; $i < 5; $i++){
                        ?>
                        <div class="form-check form-check-inline col-6 col-sm-4 col-md-3 m-0">
                          <input class="form-check-input" type="checkbox" id="dk_search_<?php echo $i;?>" value="option1">
                          <label class="form-check-label" for="dk_search_<?php echo $i;?>">Chung chủ</label>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="form-check form-check-inline col-6 col-sm-4 col-md-3 m-0">
                          <label class="form-check-label" for="" data-toggle="modal" data-target="#modal_dk_search">Xem thêm...</label>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="mb-1">
            <nav class="navbar p-2 bg-colorl btn_list_bs_mb collapsed" data-toggle="collapse" data-target="#btn_list_s_bs_mb" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <h5 class="m-0 w-100 mb-1">
                    <span>Điều kiện</span>
                    <span class="float-right btn_dk_bs_mb">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </h5>
            </nav>
            <div class="collapse" id="btn_list_s_bs_mb">
                <div class="bg-colorl p-2">
                    <div class="row">
                        <?php 
                            for($i = 0; $i < 5; $i++){
                        ?>
                        <div class="form-check form-check-inline col-6 col-sm-4 col-md-3 m-0">
                          <input class="form-check-input" type="checkbox" id="dk_search_<?php echo $i;?>" value="option1">
                          <label class="form-check-label" for="dk_search_<?php echo $i;?>">Chung chủ</label>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="form-check form-check-inline col-6 col-sm-4 col-md-3 m-0">
                          <label class="form-check-label" for="" data-toggle="modal" data-target="#modal_dk_search">Xem thêm...</label>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
</section>
<!--end-->
<section class="menu_user_header" id="menu_user_header">
    <nav class="navbar navbar-expand-lg navbar-light bg-colors m-0 p-0">
      <div class="container">
            <div class="menu_header d-lg-flex w-100">
                    <div class="">
                        <div class="menu_logo_header">
                            <div class="py-1">
                                <a href="/">
                                    <img id="menu_logo_header_img" height="42" src="">
                                </a>
                            </div>
                            <div id="box_search_menu_header" class="text-right py-1">
                                <input class="form-control rounded-0 box_search_mobile_header" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            </div>
                            <div class="text-right d-flex">
                                
                                <button class="navbar-toggler nav-link ml-auto text-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav text-left w-100 pl-3">
                            <a class="nav-link text-white" href="/">Trang chủ</a>
                            <a class="nav-link text-white" href="/timkiem">Tìm trọ</a>
                            <a class="nav-link text-white" href="#">Tin tức</a>
                            <a class="nav-link text-white" href="#">Liên hệ</a>
                            <div class="ml-lg-auto d-flex">
                                <div class="dropdown" style="width: 175px;text-align: right;">
                                  <a class="nav-link bg-colors text-white" href="#" id="btn_noti_header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Thông báo">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                  </a>
                                  <div class="dropdown-menu border-0 text-white bg-colors" aria-labelledby="btn_noti_header">
                                      <?php 
                                        foreach($RoomLike as $value){
                                            $urlImage =  explode(",", filter_var(trim($value->room_image, ",")));
                                      ?>
                                    <a class="dropdown-item" href="/phongtro/chitietphongtro/<?php echo $value->id_room; ?>">
                                        <div class="row" style="min-width: 250px;">
                                            <div class="col-4">
                                                <img class="w-100" src="/public/upload/image/<?php echo $urlImage[0]; ?>" />
                                            </div>
                                            <div class="col-8 px-1">
                                                <p class=" text-truncate"><?php  echo $value->room_title?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php }?>
                                  </div>
                                </div>
                                <div class="dropdown ml-3">
                                  <?php
                                    if(isset($_SESSION['user_name'])){
                                        ?>
                                        <a class="nav-link bg-colors text-white" href="/login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo "Xin chào ".$_SESSION['user_name']; ?>
                                        </a>
                                    <?php
                                    }else{
                                        ?>
                                    <a class="nav-link bg-colors text-white" href="/login">Đăng nhập</a>        
                                <?php
                                    }
                                  ?>
                                  <div class="dropdown-menu border-0 text-white bg-colors" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/home/thong_tin_tai_khoan">Thông tin</a>
                                    <a class="dropdown-item" id="logOutUser" href="#">Thoát</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      </div>
    </nav>
</section>