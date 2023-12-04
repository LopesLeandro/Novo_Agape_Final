<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "@Ruth12345";
    private $dbname = "agape";

    public function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
