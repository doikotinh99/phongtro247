<div class="w-100 pb-2 sticky-top-50 bg-white">
    <div class="input-group">
        <div class="w-50 mr-auto">
            <input id="boxSearchVendor" type="text" class="form-control" placeholder="Tìm kiếm phòng trọ(Tên phòng trọ)" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="dropdown">
            <button class="btn bg-colors text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lọc
            </button>
            <div class="dropdown-menu bg-colors" aria-labelledby="dropdownMenuButton">
                <a id="allRoomV" class="dropdown-item" href="#">Tất cả</a>
                <a id="activeRoomV" class="dropdown-item" href="#">Đang hoạt động</a>
                <a id="TimeoutRoomV" class="dropdown-item" href="#">Hết hạn</a>
                <a id="waitingRoomV" class="dropdown-item" href="#">Chờ xử lý</a>
                <a id="overRoomV" class="dropdown-item" href="#">Hết phòng</a>
            </div>
        </div>
        <a type="button" href="/vendor/post_room" class="btn bg-colors text-white ml-2">Đăng bài</a>
    </div>
</div>