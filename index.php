<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolahku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="card mx-auto m-3">
        <div class="card-header bg-primary text-light">
            <h4>Data Sekolah</h4>
        </div>
        <div class=" card-body table-responsive">
            <a class="btn btn-primary mt-3 mb-3" href="/uts/tambah.php" role="button">Tambah Data</a>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NPSN</th>
                        <th>Status Sekolah</th>
                        <th>Bentuk Pendidikan</th>
                        <th>Nama Sekolah</th>
                        <th>SK Pendirian Sekolah</th>
                        <th>Tanggal Pendirian</th>
                        <th>SK Izin Operasional</th>
                        <th>Tanggal Izin Operasional</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Dusun</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Kabupaten/Kota</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';

                    //menampilkan data 
                    $sql    = "SELECT * FROM data_sekolah";
                    $result = $connect->query($sql);
                    if (!$result) {
                        die("Invalid Query: " . $connect->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>$row[npsn]</td>
                                <td>$row[status]</td> 
                                <td>$row[bentuk_pendidikan]</td>
                                <td>$row[nama_sekolah]</td>
                                <td>$row[sk_pendirian]</td>
                                <td>$row[tgl_pendirian]</td>
                                <td>$row[sk_izin_operasional]</td>
                                <td>$row[tgl_izin_operasional]</td>
                                <td>$row[alamat]</td>
                                <td>$row[rt]</td>
                                <td>$row[rw]</td>
                                <td>$row[dusun]</td>
                                <td>$row[desa]</td>
                                <td>$row[kecamatan]</td>
                                <td>$row[kabupaten_kota]</td>
                                <td>$row[provinsi]</td>
                                <td>$row[kode_pos]</td>
                                <td>
                                    <a class='btn btn-primary' href='edit.php?npsn=$row[npsn]'>Edit</a> 
                                    <a class='btn btn-danger' href='delete.php?npsn=$row[npsn]'>Hapus</a>
                                </td>
                            </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>