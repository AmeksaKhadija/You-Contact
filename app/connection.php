<?php

class Connection {
    // public $conn;
    private string $servename = "localhost"; 
    private string $username = "root";  
    private string $password = "";  
    private string $dbname = "YouContact"; 

    public function connect() {
        $conn = null;
        try {
            $conn = new PDO("mysql:host={$this->servename};dbname={$this->dbname}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully <br>" ;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getmessage();
        }
        return $conn;
    }
}


?>