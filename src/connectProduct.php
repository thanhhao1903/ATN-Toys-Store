<?php
class connect
{
    public $server;
    public $user;
    public $password;
    public $dbName;
    public function __construct()
    {
        $this->server = "d6rii63wp64rsfb5.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "wdrswkyvd1ecxb0n";
        $this->password = "z5jvhm6l3hdf3a98";
        $this->dbName = "avjya40cm94g6lam";

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
