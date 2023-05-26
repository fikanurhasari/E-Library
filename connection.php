<?php

session_start();
$username="DB_LIBRARY";
$password="db_library";
$db="(DESCRIPTION = (ADDRESS = TCP)(HOST = localhost)(PORT = 1521))(CONNECT_DATA = (SERVER = DEDICATED)(SERVICE_NAME = XE)))";

$connection = oci_connect($username, $password, 'localhost/XE');
if (!$connection){
    $e = oci_error();
    echo htmlentities($e["messeage"]);
}

?>
