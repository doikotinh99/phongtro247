<?php
require_once "./mvc/core/controller.php";
class Error404 extends Controller
{

    function __construct()
    {
        
    }
    function index(){
        $this -> Error();
    }
}
?>