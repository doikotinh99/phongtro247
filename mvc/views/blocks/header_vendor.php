<section class="menu_user_header" id="menu_user_header">
    <nav class="navbar navbar-expand-lg navbar-light bg-colors m-0 p-0">
      <div class="container">
            <div class="menu_header d-lg-flex w-100">
                    <div class="">
                        <div class="menu_logo_header">
                            <div class="py-1">
                                <a href="/">
                                    <img id="menu_logo_header_img" height="42" src="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav text-left w-100 pl-3">
                            <div class="ml-lg-auto d-flex">
                                
                                  <div class="dropdown">
                                  <a class="nav-link bg-colors text-white" href="#" id="btn_noti_header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Thông báo">
                                    <i class="far fa-comment-dots"></i> Tin nhắn
                                  </a>
                                  <div class="dropdown-menu border-0 text-white bg-colors" aria-labelledby="btn_noti_header">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                                </div>
                                <div class="dropdown">
                                  <a class="nav-link bg-colors text-white" href="#" id="btn_noti_header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Thông báo">
                                    <i class="fas fa-bell"></i> Thông báo
                                  </a>
                                  <div class="dropdown-menu border-0 text-white bg-colors" aria-labelledby="btn_noti_header">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                                </div>
                                <div class="dropdown ml-3">
                                  <?php
                                    if(isset($_SESSION['user_name'])){
                                        ?>
                                        <a class="nav-link bg-colors text-white" href="/login" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo "Xin chào ".$_SESSION['user_name']; ?>
                                        </a>
                                    <?php
                                    }else{
                                        ?>
                                    <a class="nav-link bg-colors text-white" href="/login">Đăng nhập</a>        
                                <?php
                                    }
                                  ?>
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
</section>