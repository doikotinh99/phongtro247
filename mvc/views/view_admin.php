<?php 
    $data = json_decode($data["data"]);
    $data = (array)$data;
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng Nhập| Phòng trọ 24/7</title>
        <?php 
            require_once "./mvc/views/blocks/link_header.php";
        ?>

    </head>

    <body>
        <header class="header_admin">
            <?php 
                require_once "./mvc/views/blocks/header_admin.php";
            ?>
        </header>
        <main class="container-fluid d-flex h-75vh">
            <div class="w-25 h-100 border rounded overflow-auto">
                <?php
                    require_once "./mvc/views/pages/" .$data["page"].".php";
                ?>
            </div>
            <div id="dataAdmin" class="w-75 h-100 p-2 border rounded ml-auto overflow-auto">
                
            </div>
        </main>
        <footer class="footer_admin">
            
        </footer>
        <?php require_once "./mvc/views/blocks/link_footer.php"; ?>
    </body>

</html>
