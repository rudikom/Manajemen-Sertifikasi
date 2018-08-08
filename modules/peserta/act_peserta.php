<?php
	include"../../config/database.php";


	$mod = @$_GET['mod'];
	$act = @$_GET['act'];


	if ($mod == 'peserta' AND $act == 'simpan') {

		mysql_query("INSERT INTO tb_peserta(id,
											nik,
											id_skema,
											id_lokasi,
											nama,
											tgl_lahir,
											hp,
											email,
											organisasi,
											rekomendasi,
											tgl_terbit)
									VALUES(NULL,
											'".$_POST['nik']."',
											'".$_POST['skema']."',
											'".$_POST['lokasi']."',
											'".$_POST['nama']."',
											'".$_POST['tgl_lahir']."',
											'".$_POST['hp']."',
											'".$_POST['email']."',
											'".$_POST['organisasi']."',
											'".$_POST['rekomendasi']."',
											'".$_POST['tgl_terbit']."')") or die(mysql_error());
		echo"<script>
			alert('Berhasil melakukan input data peserta...');
			window.location=('../../index.php')
		</script>";
	}else
    if ($mod == 'peserta' AND $act == 'update') {

  		mysql_query("UPDATE tb_peserta

        SET (nik='".$_POST['nik']."',	id_skema='".$_POST['skema']."',
  											id_lokasi='".$_POST['lokasi']."',
  											nama='".$_POST['nama']."',
  											tgl_lahir='".$_POST['tgl_lahir']."'',
  											hp='".$_POST['hp']."',
  											email='".$_POST['email']."',
  											organisasi='".$_POST['organisasi']."',
  											rekomendasi='".$_POST['rekomendasi']."',
  											tgl_terbit='".$_POST['lokasi']."')
  									") or die(mysql_error());
  		echo"<script>
  			alert('Berhasil melakukan update data peserta...');
  			window.location=('../../index.php')
  		</script>";

  }else
  if ($mod == 'peserta' AND $act == 'delete') {
    $id=@$_GET['id'];
    mysql_query("DELETE from tb_peserta where id=$id") or die(mysql_error());
    echo "<script>document.location.href='../../index.php'</script>";
  }
?>
