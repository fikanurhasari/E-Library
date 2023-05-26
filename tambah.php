<?php
    include('connection.php');
    if(!$_SESSION['login']){
        header("location:tambah.php");
    }
    $statement = oci_parse($connection, "SELECT * FROM TB_BUKU WHERE DEL_FLAGE = 0");
    oci_execute($statement);
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
            <h3 class="text-center"><b>Tambah Buku</b></h3>
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            
            ?>    
        </div>    
        <div class="card mt-5">
            <form method="POST" action= "tambah_proses.php">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_buku">ID_BUKU</label>
                        <input type="number" class="form-control" id ="id_buku" name ="id_buku" placeholder="Masukkan id buku..." required>
                    </div>
                     <div class="form-group">
                        <label for="judul_buku">JUDUL_BUKU</label>
                        <input type="text" class="form-control" id ="judul_buku" name ="judul_buku" placeholder="Masukkan judul buku..." required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_buku">KATEGORI_BUKU</label>
                        <input type="text" class="form-control" id ="kategori_buku" name ="kategori_buku" placeholder="Masukkan kategori buku..." required>
                        
                    </div>
                    <div class="form-group">
                        <label for="genre">GENRE </label>
                        <input type="text" class="form-control" id ="genre" name ="genre" placeholder="Masukkan genre..." required>
                    </div>
                    <div class="form-group">
                        <label for="detail_buku">DETAIL_BUKU</label>
                        <input type="text" class="form-control" id ="detail_buku" name ="detail_buku" placeholder="Masukkan detail buku..." required>
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

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('head.php');?>
</head>
<body>
    <?php include('nav_admin.php'); ?>
    <div class= "container" style = "margin-top :100px; margin-bottom : 100px;">
        <div class="pt-5">
            <h3 class="text-center"><b>Daftar Buku</b></h3>
            <?php 
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    $_SESSION['message'] = null;
                }
            ?>    
        </div>
            <div class="card mt-5">
                <div class="card-header"></div>
                <a class = "btn btn-primary float-right" href="tambah.php"><i class="fas fa-plus"></i>ADD</a>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>id_buku</td>
                            <td>judul_buku</td>
                            <td>kategori_buku</td>
                            <td>genre</td>
                            <td>detail_buku</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $no = 1;
                            while($row = oci_fetch_array($statement)){
                                echo '<tr>';
                                echo '<td>'.$row['ID_BUKU'].'</td>';
                                echo '<td>'.$row['JUDUL_BUKU'].'</td>';
                                echo '<td>'.$row['KATEGORI_BUKU'].'</td>';
                                echo '<td>'.$row['GENRE'].'</td>';
                                echo '<td>'.$row['DETAIL_BUKU'].'</td>';
                                echo '<td><a href="ubah.php?id='.$row['ID_BUKU'].'" class="btn btn-primary btn-block">ubah</a>
                                <a href="detail.php?id='.$row['ID_BUKU'].'" class="btn btn-primary btn-block">Detail</a>
                                <a href="hapus.php?id='.$row['ID_BUKU'].'" onclick="return confirm(\'apakah anda yakin?\')" class="btn btn-primary btn-block">Delete</a>';
                            }
                            ?>
                    </tbody>
                </div>
            </div>
        <div>
     </div>
    </div> 
    <?php include('js.php');?>
</body>
</html>