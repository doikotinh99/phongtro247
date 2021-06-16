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
        <main class="w-100">
            <?php
            require_once "./mvc/views/pages/" . $data["modal"] . ".php";
            require_once "./mvc/views/pages/" . $data["page"] . ".php";
        ?>
        </main>
        <?php require_once "./mvc/views/blocks/link_footer.php"; ?>
    </body>

</html>
