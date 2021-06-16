<nav class="navbar navbar-expand-lg navbar-light bg-colors m-0 p-0">
  <div class="w-100 px-2">
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
                        <span id="title_admin" class="navbar-text ml-auto mr-auto text-white font-weight-bold h4">Chào mừng bạn đến với giao diện quản trị</span>
                        <div class="ml-lg-auto d-flex">
                            
                            <div class="dropdown ml-3">
                                    <a class="nav-link bg-colors text-white" href="/login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo "Xin chào ".$_SESSION['user_name']; ?>
                                    </a>
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