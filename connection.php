<?php

//DB bağlantımızı yaptığımız class.
class DbConnection{
    private $host = "localhost";
    private $dbName = "savedata";
    private $userName = "root";
    private $password = "";
    public $connection = null;

    public function getConnection(){

        $this->connection = new mysqli($this->host,$this->userName,$this->password,$this->dbName);

        if($this->connection->connect_error){
            die("Bağlantı hatası oluştu!");
        }
        else{
            return $this->connection;
        }

    }
    
}
?>