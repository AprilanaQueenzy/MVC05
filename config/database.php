<?php
class Database {
    private $host = "localhost";
    private $db = "db_toko";
    private $user = "root";
    private $pass = "root";
    public $conn;

    public function getKoneksi() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>