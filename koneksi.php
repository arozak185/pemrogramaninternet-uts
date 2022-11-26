<?php
$server   = "localhost";
$user     = "root";
$password = "";
$db       = "sekolahku";

$connect  = new mysqli($server, $user, $password, $db);
if (!$connect) { //cek koneksi
    die("koneksi gagal");
}
