<div class="w-100 mb-1">
    <div class="input-group">
        <div class=" w-50 mr-auto">
            <input id="boxSearchAd" type="text" class="form-control" placeholder="Tìm kiếm tài khoản(email, tên, số điện thoại)" aria-label="Username" aria-describedby="basic-addon1">
            <!--js xử lý tìm kiếm-->
            <script>
                $("#boxSearchAd").keyup(function(){
                    $keyW = $(this).val();
                    $cl = $(this).attr("class");
                    $start = $cl.lastIndexOf(" ") + 1;
                    $end = $cl.length;
                    $fileName = $cl.slice($start, $end);
                    $.post("ajax/adminSearchAcc", {keyW : $keyW, id : $fileName}, function(data){
                        $("#dataAccount").html(data);
                    })
                })
            </script>
        </div>
        <div class="dropdown">
            <button class="btn bg-colors text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lọc
            </button>
            <div class="dropdown-menu bg-colors" aria-labelledby="dropdownMenuButton">
                <a id="allAcc" class="dropdown-item" href="#">Tất cả</a>
                <a id="AccActive" class="dropdown-item" href="#">Kích hoạt</a>
                <a id="AccBan" class="dropdown-item" href="#">khóa</a>
            </div>
        </div>
    </div>
</div>