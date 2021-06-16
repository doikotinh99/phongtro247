<?php 
$provinc = json_decode($data["provinc"]);
$provinc = (array)$provinc;
?>
<div class="position-relative full_slide_show_header">
    <!--sile show-->
    <section id="slide_show_header" class="preloading">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000">
              <img src="./public/upload/image/slideshow1.jpg" class="d-block w-100 " alt="...">
            </div>
            <div class="carousel-item" data-interval="5000">
              <img src="./public/upload/image/slideshow2.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
    </section>
    <!--box search-->
    <section id="box_search_header" class="position-absolute header_bs_slideshow text-center w-100 h-100 preloading">
        <div class="text-left d-inline-block">
            <h2 class="text-white slg_search">Tìm trọ nhanh chóng - vừa ý</h2>
            <div class="d-flex">
                <div id="form_search" class="bg-colorbsop p-3 rounded">
                    <div class="row">
                        <form action="" class="input-group" method="POST">
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
                            <button name="btn-search" class="btn btn-colorbgw col" id="btnSearch" type="button">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>