<?php
namespace App\Models;
use mysqli;
require  __DIR__.'\..\Helpers\helpers.php';
class Model
{
    public $conn = null;

    public function __construct(){
        $this->mySqlAdapter();
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function mySqlAdapter()
    {
        $conn = new mysqli("localhost","root","","metak") or die("Connect failed: %s\n". $conn -> error);
        mysqli_query($conn,"SET CHARACTER SET 'utf8'");
        mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
        $this->conn = $conn;
    }
}