<?php
require_once "./mvc/core/controller.php";
class Login extends Controller
{

    function __construct()
    {
    }

    function index()
    {
        $this->view("login", [
            "page" => "login",
            "modal" => "login_regis"
        ]);
    }
}
