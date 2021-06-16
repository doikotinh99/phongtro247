<?php 
    $room = json_decode($data["room"]);
    $room = (array)$room;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày hết hạn</th>
            <th scope="col">Người tạo</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($room as $value){
        ?>
        <tr id="row_<?php echo $value->id_room; ?>" class="<?php 
            if($value->room_status == 0){
                echo "table-secondary";
            }
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timeNow = date('Y-m-d H:i:s');
            $timeInt = strtotime($timeNow) - strtotime($value->room_timeend);
            if($value->room_status == 1 && $timeInt > 0){
                echo "table-danger";
            }
        ?>">
            <td><?php echo $value->room_title ?></td>
            <td><?php echo $value->room_time; ?></td>
            <td><?php echo $value->room_timeend; ?></td>
            <td><?php echo $value->username ?></td>
            <td><?php 
                if($value->room_status == 0){
                    echo "Chờ xử lý";
                }
                if($value->room_status == 1 && $timeInt < 0){
                    echo "Đang hoạt động";
                }
                if($value->room_status == 1 && $timeInt > 0){
                    echo "Hết hạn";
                }
                if($value->room_status == 2){
                    echo "Vi phạm";
                }
                
            ?></td>
            <td>
                <div class="dropdown dropleft">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tùy chọn
                  </button>
                  <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                    <?php
                        if($value->room_status == 0){
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'active'".', '.$value->room_status.')" href="#">kích hoạt</a>';
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'ban'".', '.$value->room_status.')" href="#">Vi phạm</a>';
                        }
                        if($value->room_status == 1 && $timeInt > 0){
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'extend'".', '.$value->room_status.', 7)" href="#" data-toggle="modal" data-target="#extendRoom">Gia hạn 7 ngày</a>';
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'extend'".', '.$value->room_status.', 30)" href="#" data-toggle="modal" data-target="#extendRoom">Gia hạn 30 ngày</a>';
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'extend'".', '.$value->room_status.', 90)" href="#">Gia hạn 90 ngày</a>';
                        }
                        if($value->room_status == 1 && $timeInt < 0){
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'ban'".', '.$value->room_status.')" href="#">Vi phạm</a>';
                        }
                        if($value->room_status == 2){
                            echo '<a class="dropdown-item" onclick="actRoom('.$value->id_room.', '."'active'".', '.$value->room_status.')" href="#">Kích hoạt</a>';
                        }
                    ?>
                  </div>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>