<?php
if (isset($_GET["npsn"])) {
    $npsn = $_GET["npsn"];

    include 'koneksi.php';

    $sql = "DELETE FROM data_sekolah WHERE npsn=$npsn";
    $connect->query($sql);
}
header("location: /uts/index.php");
exit;
