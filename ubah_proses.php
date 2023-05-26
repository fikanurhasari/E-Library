<?php

     include('connection.php');

    if(isset($_POST['submit'])){
        $id_buku = $_POST['id_buku'];
        $judul_buku = $_POST['judul_buku'];
        $kategori_buku = $_POST['kategori_buku'];
        $genre = $_POST['genre'];
        $detail_buku = $_POST['detail_buku'];
        $updated_at = date('Y-m-d H:i:s');
        $statement = oci_parse($connection, "UPDATE TB_BUKU SET ID_BUKU='$id_buku', JUDUL_BUKU='$judul_buku', KATEGORI_BUKU='$kategori_buku',
        GENRE='$genre', DETAIL_BUKU='$detail_buku',
        UPDATE_AT=TO_DATE('$updated_at','yyyy-mm-dd hh24:mi:ss') WHERE ID_BUKU='$id_buku' ");
        if(oci_execute($statement)){
            $_SESSION['message'] = '<div class ="alert alert-success" role="alert">Berhasil Mengubah Data</div>' ;
            header("location:tambah.php");
        }else{
            $_SESSION['message'] = '<div class ="alert alert-danger" role="alert">Gagal Mengubah Data</div>' ;
            header("location:tambah.php?id=$id_buku");
        }
    }
?>