<?php 
    $provinc = json_decode($data["provinc"]);
    $provinc = (array)$provinc;
    $dataAccount = json_decode($data["dataAccount"]);
    $dataAccount = $dataAccount[0];
    print_r($dataAccount);
    echo $data["dataAccount"];
    $infor_gender = 0;
    if($dataAccount->infor_gender == "Nam"){
        $infor_gender = 1;
    }
    if($dataAccount->infor_gender == "Nữ"){
        $infor_gender = 2;
    }
    if($dataAccount->infor_gender == "Khác"){
        $infor_gender = 3;
    }
?>
<!-- Modal -->
<div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="ipPassOld">Mật khẩu cũ</label>
            <input type="password" class="form-control" id="ipPassOld">
          </div>
          <div class="mb-3">
                <label for="regis_pass">Mật khẩu <span id="regis_denger_length" class="text-danger d-none">- mật khẩu tối thiếu 6 ký tự.</span></label>
                <input type="password" name="regis_pass" class="form-control" id="regis_pass" required>
            </div>
            <div class="mb-3">
                <label for="regis_passa">Nhập lại mật khẩu <span id="regis_denger" class="text-danger d-none">- xác nhận mật khâu không chính xác.</span></label>
                <input type="password" name="regis_passa" class="form-control" id="regis_passa" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnResetPass" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="border rounded mb-1 p-3">
    <h1 class="h2 text-center">Thông tin tài khoản</h1>
    <hr class="mt-0">
    <form>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword">Email đăng nhập</label>
              <input type="text" class="form-control" value="<?php echo $dataAccount->user_email; ?>" id="inputPassword">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Mật khẩu</label>
              <input type="password" class="form-control" id="inputPassword" value="matkhau" data-toggle="modal" data-target="#changePass">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword">Họ, tên đệm</label>
              <input type="text" value="<?php echo $dataAccount->infor_firstname; ?>" class="form-control" id="inputPassword">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Tên</label>
              <input type="text" value="<?php echo $dataAccount->infor_lastname; ?>" class="form-control" id="inputPassword">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword">Ngày sinh</label>
            <input type="date" value="<?php echo $dataAccount->infor_birth; ?>" class="form-control" id="inputPassword">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">Giới tính</label>
            <select class="custom-select" id="inlineFormCustomSelectPref">
                <option selected>Giới tính</option>
                $infor_gender
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="3">Khác</option>
              </select>
              <script>
                    var infor_gender = <?php echo $infor_gender;?>;
                    document.getElementById("inlineFormCustomSelectPref").value = infor_gender;
                </script>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
        <label for="postProvinc">Tỉnh/Tp</label>
        <select id="postProvinc" class="form-control">
          <option selected>---Tỉnh/Tp---</option>
          <?php 
            foreach($provinc as $value){
            ?>
                <option value="<?php echo $value->code ?>"><?php echo $value->name ?></option>
            <?php
            }
          ?>
        </select>
      </div>
        <div class="form-group col-md-3">
        <label for="postDistrict">Quận/Huyện</label>
        <select id="postDistrict" class="form-control">
          <option selected>---Quận/Huyện---</option>
        </select>
      </div>
        <div class="form-group col-md-3">
        <label for="postWard">Phường/Xã</label>
        <select id="postWard" class="form-control">
          <option selected>---Phường/Xã---</option>
        </select>
      </div>
        <div class="form-group col-md-3">
        <label for="postApart">Số nhà, đường</label>
        <input type="text" class="form-control" id="postApart" placeholder="Địa chỉ cụ thể">
      </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword">Số điện thoại</label></label>
              <input type="text" value="<?php echo $dataAccount->infor_phone; ?>" class="form-control" id="phone">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword">CMND/CCCD</label>
              <input type="text" value="<?php echo $dataAccount->infor_iden; ?>" class="form-control" id="iden">
          </div>
      </div>
      <div class="w-100 text-center">
        <button class="btn bg-colors text-white" id="btnUpdateAcc">Cập nhật</button>
      </div>
    </form>
</div>