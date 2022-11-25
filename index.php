<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "sekolahku";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE data_sekolah SET
											 	npsn = '$_POST[tnpsn]',
											 	status_sekolah = '$_POST[tstatus_sekolah]',
												bentuk_pendidikan = '$_POST[tbentuk_pendidikan]',
											 	nama_sekolah = '$_POST[tnama_sekolah]'
												bentuk_pendidikan = '$_POST[tbentuk_pendidikan]'
												nama_sekolah = '$_POST[tnama_sekolah]'
												sk_pendirian = '$_POST[tsk_pendirian]'
												tgl_pendirian = '$_POST[ttgl_pendirian]'
												sk_izin_operasional = '$_POST[tsk_izin_operasional]'
												tgl_sk_izin_operasional = '$_POST[ttgl_izin_operasional]'
												alamat = '$_POST[talamat]'
												rt = '$_POST[trt]'
												rw = '$_POST[trw]'
												dusun = '$_POST[tdusun]'
												desa = '$_POST[tdesa]'
												kecamatan = '$_POST[tkecamatan]'
												kabupaten_kota = '$_POST[tkabupaten_kota]'
												provinsi = '$_POST[tprovinsi]'
												kode_pos = '$_POST[tkode_pos]'
											 WHERE id = '$_GET[id]'");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO data_sekolah (
												npsn, 
												status_sekolah, 
												bentuk_pendidikan, 
												nama_sekolah,
												sk_pendirian,
												tgl_pendirian,
												sk_izin_operasional,
												tgl_izin_operasional,
												alamat,
												rt,
												rw,
												dusun,
												desa,
												kecamatan,
												kabupaten_kota,
												provinsi,
												kodepos
												)
										  VALUES (
												'$_POST[tnpsn]',
												'$_POST[tstatus_sekolah]',
												'$_POST[tbentuk_pendidikan]',
											 	'$_POST[tnama_sekolah]'
												'$_POST[tbentuk_pendidikan]'
												'$_POST[tnama_sekolah]'
												'$_POST[tsk_pendirian]'
												'$_POST[ttgl_pendirian]'
												'$_POST[tsk_izin_operasional]'
												'$_POST[ttgl_izin_operasional]'
												'$_POST[talamat]'
												'$_POST[trt]'
												'$_POST[trw]'
												'$_POST[tdusun]'
												'$_POST[tdesa]'
												'$_POST[tkecamatan]'
												'$_POST[tkabupaten_kota]'
												'$_POST[tprovinsi]'
												'$_POST[tkode_pos]'
												)
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM data_sekolah WHERE npsn = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnpsn = $data['npsn'];
				$vstatus_sekolah = $data['status_sekolah'];
				$vbentuk_pendidikan = $data['bentuk_pendidikan'];
				$vnama_sekolah = $data['nama_sekolah'];
				$vsk_pendirian= $data['sk_pendirian'];
				$vtgl_pendirian = $data['tgl_pendirian'];
				$vsk_izin_operasional = $data['sk_izin_operasional'];
				$vtgl_izin_operasional = $data['tgl_izin_operasional'];
				$valamat = $data['alamat'];
				$vrt = $data['rt'];
				$vrw = $data['rw'];
				$vdusun = $data['dusun'];
				$vdesa = $data['desa'];
				$vkecamatan = $data['kecamatan'];
				$vkabupaten_kota = $data['kabupaten_kota'];
				$vprovinsi = $data['provinsi'];
				$vkode_pos = $data['kode_pos'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM data_sekolah WHERE npsn = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP & MySQL + Bootstrap 4</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"><link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">

	<h2 class="text-center">PROGRAM SIMPAN DATA SEKOLAHKU</h2>
	<h4 class="text-center">ABDUL ROJAK</h4>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Sekolah
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>NPSN</label>
	    		<input type="text" name="tnpsn" class="form-control" value="<?=@$vnpsn?>"required>
	    	</div>
			<div class="form-group">
	    		<label>Status Sekolah</label>
	    		<select class="form-control" name="tstatus_sekolah" required>
	    			<option value="<?=@$vstatus_sekolah?>"><?=@$vstatus_sekolah?></option>
	    			<option value="negeri">Negeri</option>
	    			<option value="swasta">Swasta</option>
	    		</select>
	    	</div>
			<div class="form-group">
	    		<label>Bentuk Pendidikan</label>
	    		<select class="form-control" name="tbentuk_pendidikan" value="<?=@$vbentuk_pendidikan?>" required>
	    			<option value="<?=@$vstatus_sekolah?>"><?=@$vstatus_sekolah?></option>
	    			<option value="tk">TK</option>
	    			<option value="sd">SD</option>
					<option value="smp">SMP</option>
	    			<option value="sma">SMA</option>
					<option value="smk">SMK</option>
	    		</select>
	    	</div>
			<div class="form-group">
	    		<label>Nama Sekolah</label>
	    		<input type="text" name="tnama_sekolah" class="form-control" value="<?=@$vnama_sekolah?>" required>
	    	</div>
			<div class="form-group">
	    		<label>SK Pendirian</label>
	    		<input type="text" name="tsk_pendirian" class="form-control" value="<?=@$vsk_pendirian?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Tanggal Pendirian</label>
	    		<input type="date" name="ttgl_pendirian" class="form-control" value="<?=@$vtgl_pendirian?>" required>
	    	</div>
			<div class="form-group">
	    		<label>SK Izin Operasional</label>
	    		<input type="text" name="tsk_izin_operasional" class="form-control" value="<?=@$vsk_izin_operasional?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Tanggal SK Izin Operasional</label>
	    		<input type="date" name="ttgl_izin_operasional" class="form-control" value="<?=@$vtgl_izin_operasional?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Alamat</label>
	    		<input type="text" name="talamat" class="form-control" value="<?=@$valamat?>" required>
	    	</div>
			<div class="form-group">
	    		<label>RT</label>
	    		<input type="text" name="trt" class="form-control" value="<?=@$vrt?>" required>
	    	</div>
			<div class="form-group">
	    		<label>RW</label>
	    		<input type="text" name="trw" class="form-control" value="<?=@$vrw?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Dusun</label>
	    		<input type="text" name="tdusun" class="form-control" value="<?=@$vdusun?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Desa</label>
	    		<input type="text" name="tdesa" class="form-control" value="<?=@$vdesa?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Kecamatan</label>
	    		<input type="text" name="tkecamatan" class="form-control" value="<?=@$vkecamatan?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Kabupaten/Kota</label>
	    		<input type="text" name="tkabupaten_kota" class="form-control" value="<?=@$vkabupaten_kota?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Provinsi</label>
	    		<input type="text" name="tprovinsi" class="form-control" value="<?=@$vprovinsi?>" required>
	    	</div>
			<div class="form-group">
	    		<label>Kode Pos</label>
	    		<input type="text" name="tkode_pos" class="form-control" value="<?=@$vkode_pos?>" required>
	    	</div>
	    	
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Sekolah
	  </div>
	  <div class="card-body table-responsive">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>NPSN</th>
	    		<th>Status Sekolah</th>
	    		<th>Bentuk Pendidikan</th>
	    		<th>Nama Sekolah</th>
	    		<th>SK Pendirian</th>
	    		<th>Tanggal Pendirian</th>
				<th>SK Izin Operasional</th>
	    		<th>Tanggal Izin Operasional</th>
	    		<th>Alamat</th>
	    		<th>RT</th>
	    		<th>RW</th>
	    		<th>Dusun</th>
				<th>Desa</th>
	    		<th>Kecamatan</th>
	    		<th>Kabupaten / Kota</th>
	    		<th>Provinsi</th>
	    		<th>Kode Pos</th>
				<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$tampil = mysqli_query($koneksi, "SELECT * from data_sekolah order by npsn desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$data['npsn']?></td>
	    		<td><?=$data['status_sekolah']?></td>
	    		<td><?=$data['bentuk_pendidikan']?></td>
	    		<td><?=$data['nama_sekolah']?></td>
				<td><?=$data['sk_pendirian']?></td>
	    		<td><?=$data['tgl_pendirian']?></td>
	    		<td><?=$data['sk_izin_operasional']?></td>
	    		<td><?=$data['tgl_izin_operasional']?></td>
				<td><?=$data['alamat']?></td>
	    		<td><?=$data['rt']?></td>
	    		<td><?=$data['rw']?></td>
	    		<td><?=$data['dusun']?></td>
				<td><?=$data['desa']?></td>
				<td><?=$data['kecamatan']?></td>
				<td><?=$data['kabupaten_kota']?></td>
				<td><?=$data['provinsi']?></td>
				<td><?=$data['kode_pos']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['npsn']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['npsn']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>