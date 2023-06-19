<?php
class connect
{
    public $server;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->server = "yjo6uubt3u5c16az.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "fg56bumni7jaz655";
        $this->password = "gd07u6k6y0nj9ura";
        $this->dbName = "pbrrlp5dndd3bnip";

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
