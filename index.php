<?php

include("connection.php");
if (isset($_SESSION['login'])) {
    header("location: halaman_admin.php");
}
$pesan = NULL;
if (isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        $pesan = '<div class="alert alert-danger" role="alert>login Gagal! Username atau password Salah!</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="./assets/custom/signin.css">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="signin_proses.php">
        <?php echo $pesan; ?>
        <img class="mb-4" src="books.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="username..." required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password..." required>
        <input type="submit" class="btn-btn-lg btn-primary btn-block" name="login" value="Login"/>
        <p class="mt-5 mb-3 text-muted">$copy; 2022</p>
    </form>
<?php include('js.php'); ?>       
</body>
</html>