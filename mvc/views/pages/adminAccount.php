<?php 
    $account = json_decode($data["account"]);
    $account = (array)$account;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($account as $value){
        ?>
        <tr id="row_<?php echo $value->user_id; ?>" class="<?php 
            if($value->user_status == 0){
                echo "table-danger";
            }
        ?>">
            <td><?php echo $value->infor_firstname." ".$value->infor_lastname ?></td>
            <td><?php echo $value->user_email; ?></td>
            <td><?php echo $value->infor_phone ?></td>
            <?php 
            if($value->address != "null"){
                $addres = json_decode($value->address);
                $addres = (array)$addres;
            }
                
            ?>
            <td>
                <?php 
                    if(isset($addres)){
                ?>
                
                <span class="mr-auto ml-auto d-inline-block text-truncate" style="max-width: 250px" title="<?php echo $addres["add_apart"].", ".$addres["add_wards"].", ".$addres["add_district"].", ".$addres["add_province"]; ?>"><?php echo $addres["add_apart"].", ".$addres["add_wards"].", ".$addres["add_district"].", ".$addres["add_province"]; ?></span>
                <?php
                    }
                ?>
            </td>
            <td>
                <div class="dropdown dropleft">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tùy chọn
                  </button>
                  <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                    <?php
                        if($value->user_status == 1){
                            echo '<a class="dropdown-item" id="user_status_'.$value->user_id.'" onclick="actAccount('.$value->user_id.', '."'ban'".')" href="#">Khóa</a>';
                        }else{
                            echo '<a class="dropdown-item" id="user_status_'.$value->user_id.'" onclick="actAccount('.$value->user_id.', '."'active'".')" href="#">kích hoạt</a>';
                        }
                    ?>
                    <a class="dropdown-item" onclick="resetPass(<?php echo $value->user_id; ?>)" href="#">Đặt lại mật khẩu</a>
                    <?php 
                        if($value->role_id == 1){
                    ?>
                        <a class="dropdown-item" onclick="actPower(<?php echo $value->user_id; ?>, 3, 'admin')" href="#">Hủy quyền quản trị</a>
                    <?php
                        }
                        
                    ?>
                    <?php 
                        if($value->role_id == 2){
                    ?>
                        <a class="dropdown-item" onclick="actPower(<?php echo $value->user_id; ?>, 3, 'vendor')" href="#">Hủy quyền chủ trọ</a>
                    <?php
                        }
                        
                    ?>
                    <?php 
                        if($value->role_id == 3){
                    ?>
                        <a class="dropdown-item" onclick="actPower(<?php echo $value->user_id; ?>, 1, 'user')" href="#">Cấp quyền quản trị</a>
                        <a class="dropdown-item" onclick="actPower(<?php echo $value->user_id; ?>, 2, 'user')" href="#">Cấp quyền chủ trọ</a>
                    <?php
                        }
                        
                    ?>
                  </div>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>