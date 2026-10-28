<?php
require_once __DIR__ . '/../model/barang_model.php';

class BarangController {
    public function tambah() {
        $model = new BarangModel();
        $pesan = "";

        if (isset($_POST['simpan'])) {
            $data = [
                'kode_barang' => $_POST['kode_barang'],
                'nama_barang' => $_POST['nama_barang'],
                'kategori'    => $_POST['kategori'],
                'harga'       => $_POST['harga'],
                'stok'        => $_POST['stok']
            ];

            if (in_array("", $data)) {
                $pesan = "Waduh, semua kolom wajib diisi!";
            } else {
                if ($model->simpan($data)) {
                    $pesan = "Berhasil! Data barang sudah masuk ke database.";
                } else {
                    $pesan = "Gagal menyimpan data.";
                }
            }
        }
        require_once __DIR__ . '/../view/tambah_barang.php';
    }
}
?>