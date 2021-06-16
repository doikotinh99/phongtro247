<?php
class Config{

    public $connect;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "phongtro247";

    function __construct(){
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->connect, $this->dbname);
        mysqli_query($this->connect, "SET NAMES 'utf8'");
    }
    
    public function check_connect($table_name)
    {
        $query = "select * from " . $table_name;
        $result =  mysqli_query($this->connect, $query);
        if ($result) {
            return true;
        } else {
            return $query;
        }
    }
}
?>
