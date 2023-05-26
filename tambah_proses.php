<?php
include('connection.php');

if(isset($_POST['submit'])){
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $kategori_buku = $_POST['kategori_buku'];
    $genre = $_POST['genre'];
    $detail_buku = $_POST['detail_buku'];
    $created_at = date('Y-m-d H:i:s');
    $del_flage = 0;
    $statement = oci_parse($connection, "INSERT INTO TB_BUKU(ID_BUKU,JUDUL_BUKU,KATEGORI_BUKU,GENRE,DETAIL_BUKU,CREATED_AT,DEL_FLAGE) VALUES ('$id_buku','$judul_buku',
    '$kategori_buku','$genre','$detail_buku',to_date('$created_at','yyyy-mm-dd hh24:mi:ss'),'$del_flage')");
    if (oci_execute($statement)) {
    $_SESSION['message'] = '<div class="alert alert-succes" role="alert">Berhasil Menambahkan Data</div>';
    header("location:tambah.php");
    } else{
    $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>';
    header("location:tambah.php");
    }
}
?>