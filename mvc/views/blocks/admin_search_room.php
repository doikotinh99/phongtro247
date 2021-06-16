<div class="w-100 mb-1">
    <div class="input-group">
        <div class=" w-50 mr-auto">
            <input id="boxSearchAd" type="text" class="form-control" placeholder="Tìm kiếm phòng trọ(Tên phòng trọ, tên chủ trọ)" aria-label="Username" aria-describedby="basic-addon1">
            <!--js xử lý tìm kiếm-->
            <script>
                $("#boxSearchAd").keyup(function(){
                    $keyW = $(this).val();
                    $cl = $(this).attr("class");
                    $start = $cl.lastIndexOf("_") + 1;
                    $end = $cl.length;
                    $status = $cl.slice($start, $end);
                    $.post("ajax/adminSearchRoom", {keyW : $keyW, status : $status}, function(data){
                        $("#dataRoom").html(data);
                    })
                })
            </script>
        </div>
        <div class="dropdown">
            <button class="btn bg-colors text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lọc
            </button>
            <div class="dropdown-menu bg-colors" aria-labelledby="dropdownMenuButton">
                <a id="allRoom" class="dropdown-item" href="#">Tất cả</a>
                <a id="activeRoom" class="dropdown-item" href="#">Đang hoạt động</a>
                <a id="TimeoutRoom" class="dropdown-item" href="#">Hết hạn</a>
                <a id="waitingRoom" class="dropdown-item" href="#">Chờ xử lý</a>
            </div>
        </div>
    </div>
</div>