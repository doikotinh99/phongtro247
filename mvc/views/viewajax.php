<?php 
    $data = json_decode($data["data"]);
    $data = (array)$data;
    $page = (array)$data["pages"];
    foreach ($page as $value) {
        require_once "./mvc/views/pages/".$value.".php";
    }
?>