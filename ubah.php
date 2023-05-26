<?php
   include('connection.php');
    if(!$_SESSION['login']){
        header("location: halaman_admin.php");
    }
    $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE ID_BUKU=".$_GET['id']);
    oci_execute($statement);
    while($row = oci_fetch_array($statement)){
        $id_buku = $row['ID_BUKU'];
        $judul_buku = $row['JUDUL_BUKU'];
        $kategori_buku = $row['KATEGORI_BUKU'];
        $genre= $row['GENRE'];
        $detail_buku= $row['DETAIL_BUKU'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("head.php"); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php include("nav_admin.php");?>
    <div class= "container" style = "margin-top :100px; margin-bottom : 100px;">
        <div class="pt-5">
            <h3 class="text-center"><b>Ubah Buku</b></h3>
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            
            ?>    
        </div>    
        <div class="card mt-5">
            <form method="POST" action= "ubah_proses.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_buku">ID_BUKU</label>
                        <input type="number" class="form-control" id ="id_buku" name ="id_buku" placeholder="Masukkan id buku..." value ="<?php echo $id_buku; ?>"required>
                        <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $id_buku?>">
                    </div>
                     <div class="form-group">
                        <label for="judul_buku">JUDUL_BUKU</label>
                        <input type="text" class="form-control" id ="judul_buku" name ="judul_buku" placeholder="Masukkan judul buku..." value ="<?php echo $judul_buku; ?>" required>
                    </div>
                    <div class="form-group">
                    <label for="kategori_buku">KATEGORI_BUKU</label>
                        <input type="text" class="form-control" id ="kategori_buku" name ="kategori_buku" placeholder="Masukkan kategori buku..." value ="<?php echo $kategori_buku; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">GENRE</label>
                        <input type="text" class="form-control" id ="genre" name ="genre" value ="<?php echo $genre; ?>" placeholder="Masukkan genre..." required>
                    </div>
                    <div class="form-group">
                        <label for="detail_buku">DETAIL_BUKU</label>
                        <input type="text" class="form-control" id ="detail_buku" name ="detail_buku" value ="<?php echo $detail_buku ?>" placeholder="Masukkan detail_buku..." required>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-danger" onclick="history.back()">Batal</button>
                        <input type="submit" name="submit" class="btn btn-success" value="SIMPAN" onclick="return confirm('Apakah Anda yakin ?')">
                    </div>
                    
                </div>
            </form>    

        </div>
        
    </div>
    <?php include('js.php'); ?>
    
</body>
</html>
