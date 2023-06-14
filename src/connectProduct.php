<?php
class connect
{
    public $server;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbName = "atn-toys";

    }
    // Option 1 : mysqli
    function connectToMySQL():mysqli
    {
        $conn_my = new mysqli($this->server,$this->user,$this->password,$this->dbName);
        if($conn_my->connect_error)
        {
            die("failed".$conn_my->connect_error);
        }
        else
        {
            // echo "Connect from mysqli";
        }
        return $conn_my;
    }
    //Option 2:PDO
    function connectToPDO():PDO
    {
        try
        {
            $conn_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
            $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connect from PDO";
        }
        catch(PDOException $e)
        {
            die("Failed $e");
        }
        return $conn_pdo;
    }
}
$c = new Connect();
// $c->connectToMySQL();
$c->connectToPDO();
?>
