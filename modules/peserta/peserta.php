<?php

	$action = "modules/peserta/act_peserta.php";
	$act = @$_GET['act'];

	switch ($act) {
		case 'form':
			echo"<form action='".$action."?mod=peserta&act=simpan' class='form' method='post'>
				<table width='100%'>
					<tr>
						<td width='150px'>NIK</td>
						<td width='10px'>:</td>
						<td><input type='text' name='nik' placeholder='nik...' required></td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td>:</td>
						<td><input type='text' name='nama' placeholder='nama...' required></td>
					</tr>
					<tr>
						<td>TGL. LAHIR</td>
						<td>:</td>
						<td><input type='date' name='tgl_lahir' id='datepicker' placeholder='99/99/1999' required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type='email' name='email' placeholder='email...' required></td>
					</tr>
					<tr>
						<td>HP</td>
						<td>:</td>
						<td><input type='text' name='hp' placeholder='nomor handphone...' required></td>
					</tr>
					<tr>
						<td>Organisasi</td>
						<td>:</td>
						<td><input type='text' name='organisasi' placeholder='Orgnisasi...' required></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>:</td>
						<td>
							<select name='lokasi'>";
							$query=mysql_query("SELECT * FROM tb_lokasi");
							while($a=mysql_fetch_assoc($query)) {
								echo "<option value='".$a['id_lok']."'>".$a['tuk']."</<option>";
							}

							echo"</select>
						</td>
					</tr>
					<tr>
						<td>Skema Sertifikasi</td>
						<td>:</td>
						<td>
							<select name='skema'>";
							$query2=mysql_query("SELECT * FROM tb_skema");
							while($b=mysql_fetch_assoc($query2)) {
								echo "<option value='".$b['id_skema']."'>".$b['nama_skema']."</<option>";
							}
							echo"</select>
						</td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>:</td>
						<td>
							<select name='rekomendasi'>
								<option value='BERKOMPETENSI'>BERKOMPETENSI</option>
								<option value='BELUM BERKOMPETENSI'>BELUM BERKOMPETENSI</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>TGL. TERBIT SERTIFIKAT</td>
						<td>:</td>
						<td><input type='date' name='tgl_terbit' id='datepicker' placeholder='99/99/1999' required></td>
					</tr>
					<tr>
						<td colspan=2>
							<input type=submit value=Simpan>
							<input type=button value=Batal onclick=self.history.back()>
						</td>
					</tr>

				</table>
			</form>";
			break;
			case 'editform':
				$id = @$_GET['id'];//mengambil id dari addressbar
				//query untuk mengambil data dari table

				$query = mysql_query("SELECT * FROM tb_peserta WHERE id = '$id' ");
				$peserta = mysql_fetch_array($query);//memecah hasil query ke dalam array
				echo"<form action='".$action."?mod=peserta&act=editform' class='form' method='post'>
					<table width='100%'>
						<tr>
							<td width='150px'>NIK</td>
							<td width='10px'>:</td>
							<td><input type='text' name='nik' value='".$peserta['nik']."' placeholder='nik...' required></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>:</td>
							<td><input type='text' name='nama' value='".$peserta['nama']."' placeholder='nama...' required></td>
						</tr>
						<tr>
							<td>TGL. LAHIR</td>
							<td>:</td>
							<td><input type='date' name='tgl_lahir' id='datepicker' placeholder='99/99/1999' required></td>
						</tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td><input type='email' name='email' placeholder='email...' required></td>
						</tr>
						<tr>
							<td>HP</td>
							<td>:</td>
							<td><input type='text' name='hp' placeholder='nomor handphone...' required></td>
						</tr>
						<tr>
							<td>Organisasi</td>
							<td>:</td>
							<td><input type='text' name='organisasi' placeholder='Orgnisasi...' required></td>
						</tr>
						<tr>
							<td>Lokasi</td>
							<td>:</td>
							<td>
								<select name='lokasi'>";
								$query=mysql_query("SELECT * FROM tb_lokasi");
								while($a=mysql_fetch_assoc($query)) {
									echo "<option value='".$a['id_lok']."'>".$a['tuk']."</<option>";
								}

								echo"</select>
							</td>
						</tr>
						<tr>
							<td>Skema Sertifikasi</td>
							<td>:</td>
							<td>
								<select name='skema'>";
								$query2=mysql_query("SELECT * FROM tb_skema");
								while($b=mysql_fetch_assoc($query2)) {
									echo "<option value='".$b['id_skema']."'>".$b['nama_skema']."</<option>";
								}
								echo"</select>
							</td>
						</tr>
						<tr>
							<td>Lokasi</td>
							<td>:</td>
							<td>
								<select name='rekomendasi'>
									<option value='BERKOMPETENSI'>BERKOMPETENSI</option>
									<option value='BELUM BERKOMPETENSI'>BELUM BERKOMPETENSI</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>TGL. TERBIT SERTIFIKAT</td>
							<td>:</td>
							<td><input type='date' name='tgl_terbit' id='datepicker' placeholder='99/99/1999' required></td>
						</tr>
						<tr>
							<td colspan=2>
								<input type=submit value=Update>
								<input type=button value=Batal onclick=self.history.back()>
							</td>
						</tr>

					</table>
				</form>";



			break;

		default:
			echo"<table class='table'>
				<tr>
					<th>#</th>
					<th>NIK</th>
					<th>NAMA</th>
					<th>TGL. LAHIR</th>
					<th>NO. HP</th>
					<th>EMAIL</th>
					<th>ORGANISASI</th>
					<th>REKOMENDASI</th>
					<th>TGL. TERBIT S.</th>
					<th>Action</th>
				</tr>";

				$query = "SELECT * FROM tb_peserta ORDER BY tgl_lahir ASC";
				$result = mysql_query($query) or die(mysql_error());
				$temukan = mysql_num_rows($result);

				if ($temukan > 0) {
					$no = 1;
					while ($data = mysql_fetch_assoc($result)) {
						$id=$data['id'];
						echo"<tr>
							<td>".$no."</td>
							<td>".$data['nik']."</td>
							<td>".$data['nama']."</td>
							<td>".$data['tgl_lahir']."</td>
							<td>".$data['hp']."</td>
							<td>".$data['email']."</td>
							<td>".$data['organisasi']."</td>
							<td>".$data['rekomendasi']."</td>
							<td>".$data['tgl_terbit']."</td>
							<td><a href='med.php?mod=peserta&act=editform&id=$id'>EDIT</a> |
									<a href='".$action."?mod=peserta&act=delete&id=$id'>DELETE</a>
							</td>
						</tr>";

						$no++;
					}
				}
			echo"</table>";


			break;
	}
?>
