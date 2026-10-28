<?php
require_once __DIR__ . '/../config/database.php';

class BarangModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getKoneksi();
    }

    public function simpan($data) {
        try {
            $sql = "INSERT INTO barang (kode_barang, nama_barang, kategori, harga, stok) VALUES (:kode, :nama, :kategori, :harga, :stok)";
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute([
                ':kode'     => $data['kode_barang'],
                ':nama'     => $data['nama_barang'],
                ':kategori' => $data['kategori'],
                ':harga'    => $data['harga'],
                ':stok'     => $data['stok']
            ]);
        } catch (PDOException $e) {
            echo "Error Database: " . $e->getMessage();
            return false;
        }
    }
}
?>