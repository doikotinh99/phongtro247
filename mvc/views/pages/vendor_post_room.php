<?php 
    $provinc = json_decode($data["provinc"]);
    $provinc = (array)$provinc;
?>
<div class="container border rounded my-2">
  <h1 class="text-center">Đăng bài</h1>
  <form action="/ajax/upImage" method="post" enctype="multipart/form-data">
     <h5>Thông tin phòng</h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="RoomName">Tên phòng trọ</label>
        <input type="text" class="form-control" name="RoomName" id="RoomName" placeholder="Tên hiển thị của phòng trọ">
      </div>
      <div class="form-group col-md-2">
        <label for="postProvinc">Tỉnh/Tp</label>
        <select id="postProvinc" class="form-control">
          <option selected>Tỉnh/Tp</option>
          <?php 
            foreach($provinc as $value){
            ?>
                <option value="<?php echo $value->code ?>"><?php echo $value->name ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="postDistrict">Quận/Huyện</label>
        <select id="postDistrict" class="form-control">
          <option selected>Quận/Huyện</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="postWard">Phường/Xã</label>
        <select id="postWard" class="form-control">
          <option selected>Phường/Xã</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="postApart">Số nhà, đường</label>
        <input type="text" class="form-control" name="postApart" id="postApart" placeholder="Địa chỉ cụ thể">
      </div>
    </div>
    
    <h5>Giá phòng</h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="postPrice">Giá</label>
        <input type="text" class="form-control" name="postPrice" id="postPrice" placeholder="Giá thuê 1 tháng VNĐ">
      </div>
      <div class="form-group col-md-4">
        <label for="postElect">Điện</label>
        <input type="text" class="form-control" name="postElect" id="postElect" placeholder="Giá nước vd: 4000/số">
      </div>
      <div class="form-group col-md-4">
        <label for="postWater">Nước</label>
        <input type="text" class="form-control" name="postWater" id="postWater" placeholder="Giá nước vd: 4000/số, 100000/Tháng">
      </div>
    </div>
    <h5>Thông số phòng</h5>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="postCategory">Loại phòng</label>
        <input type="text" class="form-control" name="postCategory" id="postCategory" placeholder="Cấp 4, trung cư...">
      </div>
      <div class="form-group col-md-4">
        <label for="postCount">Số phòng trống</label>
        <input type="text" class="form-control" name="postCount" id="postCount" placeholder="10">
      </div>
      <div class="form-group col-md-4">
        <label for="postAreage">Diện tích(m<sup>2</sup>)</label>
        <input type="text" name="postAreage" class="form-control" id="postAreage" placeholder="100">
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="postDetail">Nội thất</label>
            <input type="text" class="form-control" name="postDetail" id="postDetail" placeholder="2 phòng ngủ, 3 WC, 1 phòng khách...">
        </div>
        <div class="form-group col-md-4">
            <label for="postClosed">Khép kín</label>
            <select id="postClosed" name="postClosed" class="form-control">
              <option value="Không khép kín">Không khép kín</option>
                <option value="khép kín" selected>khép kín</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="postTimeend">Thời hạn hiển thị</label>
            <select id="postTimeend" name="postTimeend" class="form-control">
              <option value="7" selected>7 ngày</option>
                <option value="30">30 ngày</option>
                <option value="30">90 ngày</option>
            </select>
        </div>
    </div>
    <h5>Đồ trong phòng</h5>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="postAirCo">Điều hòa</label>
        <select id="postAirCo" name="postAirCo" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postHeater">Bình nước nóng</label>
        <select id="postHeater" name="postHeater" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postFridge">Tủ lạnh</label>
        <select id="postFridge" name="postFridge" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postWM">Máy giặt</label>
        <select id="postWM" name="postWM" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="postBed">Giường</label>
        <select id="postBed" name="postBed" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postWardrobe">Tủ</label>
        <select id="postWardrobe" name="postWardrobe" class="form-control">
          <option value="0" selected>Không có</option>
          <?php 
            for($i = 1; $i <= 10; $i++){
            ?>
            <option value ="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            }
          ?>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postNearHost">Chung chủ</label>
        <select id="postNearHost" name="postNearHost" class="form-control">
          <option value="không" selected>Không Chung chủ</option>
          <option value="chung chủ" selected>Chung chủ</option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label for="postTime">Giờ giấc</label>
        <input type="text" class="form-control" name="postTime" id="postTime" placeholder="Từ 6h đến 23h">
      </div>
    </div>
    <h5>Mô tả về phòng</h5>
      <div class="form-group">
        <label for="postImage">Ảnh mô tả(Ảnh đầu tiên được chọn làm ảnh đại diện)</label>
        <input type="file" name="file[]" multiple class="form-control-file" id="postImage" accept="image/png, image/jpeg, image/jpg">
      </div>
    <div class="mb-3">
        <label for="postNote">Ghi chú</label>
        <textarea class="form-control" id="postNote" name="postNote" placeholder="Ghi chú thêm về phòng"></textarea>
      </div>
    <div class="mb-3">
        <label for="post_posts">Bài mô tả về phòng trọ(Có thể chèn ảnh, video, copy từ word)</label>
        <textarea name="post_posts" id="post_posts" cols="30" rows="10"></textarea>
    </div>
    <div class="w-100 text-center mb-2">
        <button type="button" id="closedPost" class="btn bg-colorl text-white">Hủy</button>
        <button type="submit" id="btnPost" name="btnPost" class="btn bg-colors text-white">Đăng bài</button>
    </div>
  </form>
  <script src="/public/ckeditor/ckeditor.js"></script>
  <script src="/public/ckfinder/ckfinder.js"></script>
  <script>
      $editor = CKEDITOR.replace( 'post_posts', {
        filebrowserBrowseUrl: 'https://phongtro247.xyz/public/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: 'https://phongtro247.xyz/public/ckfinder/ckfinder.html?Type=Images',
        filebrowserUploadUrl: 'https://phongtro247.xyz/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: 'https://phongtro247.xyz/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserWindowWidth : '1000',
        filebrowserWindowHeight : '700'
    });
  </script>
</div>