<?php 
$provinc = json_decode($data["provinc"]);
$provinc = (array)$provinc;
?>
<nav class="navbar navbar-light bg-light">
    <div class="row ml-auto">
        <div class="input-group">
            <select name="provinc" id="postProvinc" class="custom-select col">
              <option selected>Tỉnh/Tp</option>
              <?php 
                foreach($provinc as $value){
                ?>
                    <option value="<?php echo $value->code ?>"><?php echo $value->name ?></option>
                <?php
                }
              ?>
            </select>
            <select name="district" id="postDistrict" class="custom-select col">
              <option selected>Quận/Huyện</option>
            </select>
            <select name="ward" id="postWard" class="custom-select col">
              <option selected>Phường/Xã</option>
            </select>
            <select name="price" class="custom-select col" id="price">
                <option selected>Khoảng giá</option>
                <option value="1">1tr đến 2tr5</option>
                <option value="2">2tr5 đến 5tr</option>
                <option value="3">trên 5tr</option>
            </select>
            <select name="acreage" class="custom-select col" id="acreage">
                <option selected>Diện tích</option>
                <option value="1">Dưới 15m<sup>2</sup></option>
                <option value="2">từ 15m<sup>2</sup> đến 30m<sup>2</sup></option>
                <option value="3">trên 30m<sup>2</sup></option>
            </select>
            <button class="btn btn-colormbg col border"><i class="fas fa-filter"></i> Lọc</button>
        </div>
    </div>
</nav>
<div id="SearchData" class="row main_list_card">
    <?php 
        for($i = 0; $i < 12; $i++){
    ?>
    <a class="text-decoration-none text-dark d-block col-12 col-sm-12 col-md-4 col-lg-4 mb-3" href="#">
        <div class="card mx-2">
            <div class="row">
                <div class="col-5 col-sm-5 col-md-12 col-lg-12">
                    <img src="/public/upload/image/slideshow1.jpg" class="card-img-top" alt="...">
                </div>
                <div class="card-body col-7 col-sm-7 col-md-12 col-lg-12 py-md-0">
                    <p class="card-text mb-1 ellipsis-1 text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="mb-1">
                        <span>Diện tích: </span>
                        <span class="text-muted">30m<sup>2</sup></span>
                    </p>
                    <p class="mb-0">Giá: <span class="font-weight-bold text-danger">4,5 Tỷ</span></p>
                    <p class="">
                        <span>Đánh giá: </span>
                        <span class="text-colorl">4.5/5</span>
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
                <span>1 phút trước</span> - <span>Hà Nội</span>
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