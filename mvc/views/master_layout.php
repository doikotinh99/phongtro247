<?php 
    $data = json_decode($data["data"]);
    $data = (array)$data;
    $data["main"] = (array)$data["main"];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Phòng trọ 24/7 nhanh chóng - vừa ý</title>
        <?php 
            require_once "./mvc/views/blocks/link_header.php";
        ?>
    </head>

    <body>
        <!--menu fixed-->
        <?php 
            if(isset($data["header"])){
                require_once "./mvc/views/blocks/".$data["header"].".php";
            }else{
                require_once "./mvc/views/blocks/menu_user.php";
            }
        ?>
        <header>
            <?php
                if(isset($data["sshow"])){
                    require_once "./mvc/views/blocks/".$data["sshow"].".php";
                }
            ?>
        </header>
        <!--menu position sticky-->

        <main class="w-100">
            <div class="container mt-2">
                <?php
                    if(isset($data["bread"])){
                        require_once "./mvc/views/pages/breadcrumb.php";
                    }
                ?>
                
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 pr-md-2">
                        <?php 
                            foreach ($data["main"] as $value) {
                                require_once "./mvc/views/pages/".$value.".php";
                            }
                        ?>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 position-relative">
                        <?php
                        $data["main_left"] = (array)$data["main_left"];
                            foreach ($data["main_left"] as $value) {
                                require_once "./mvc/views/pages/".$value.".php";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                if(isset($data["main_ft"])){
                    $data["main_ft"] = (array)$data["main_ft"];
                    foreach ($data["main_ft"] as $value) {
                        require_once "./mvc/views/pages/".$value.".php";
                    }
                }
                
            ?>
            
        </main>
        <footer>
            <?php 
                require_once "./mvc/views/blocks/footer.php";
            ?>
        </footer>
        <?php require_once "./mvc/views/blocks/link_footer.php"; ?>
    </body>

</html>
