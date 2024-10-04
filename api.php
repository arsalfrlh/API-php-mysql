<?php
$host = "localhost";
$usr = "root";
$pass = "";
$db = "db_api";

$koneksi = mysqli_connect($host,$usr,$pass,$db);
header('Content-Type: application/json; charset=utf8');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $query = mysqli_query($koneksi,"SELECT * FROM tbl_barang");
    $hasil = array();
    while($barang=mysqli_fetch_assoc($query)){
        $hasil[] = $barang;
    }
    echo json_encode($hasil);
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $gambar = $_POST['gambar'];
    $nmbarang = $_POST['nama_barang'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $query = mysqli_query($koneksi,"INSERT INTO tbl_barang (id_barang,gambar,nama_barang,merk,harga,stok,tgl_dibuat) VALUES ('NULL','$gambar','$nmbarang','$merk','$harga','$stok',CURRENT_TIMESTAMP())");
    if($query){
        $pesan = [
            'status' => "Berhasil menambahkan data"
        ];
        echo json_encode([$pesan]);
    }else{
        $pesan = [
            'status' => "Gagal menambahkan data"
        ];
        echo json_encode([$pesan]);
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM tbl_barang WHERE id_barang='$id'");
    if($query){
        $pesan = [
            'status' => "Hapus data berhasil"
        ];
        echo json_encode([$pesan]);
    }else{
        $pesan = [
            'status' => "Hapus data gagal"
        ];
        echo json_encode([$pesan]);
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $id = $_GET['id'];
    $gambar = $_GET['gambar'];
    $nmbarang = $_GET['nama_barang'];
    $merk = $_GET['merk'];
    $harga = $_GET['harga'];
    $stok = $_GET['stok'];
    $query = mysqli_query($koneksi,"UPDATE tbl_barang SET gambar='$gambar', nama_barang='$nmbarang', merk='$merk', harga='$harga', stok='$stok', tgl_dibuat=CURRENT_TIMESTAMP() WHERE id_barang='$id'");
    if($query){
        $pesan = [
            'status' => "Edit data berhasil"
        ];
        echo json_encode([$pesan]);
    }else{
        $pesan = [
            'status' => "Edit data gagal"
        ];
        echo json_encode([$pesan]);
    }
}
?>