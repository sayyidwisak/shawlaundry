<?php include "restrict.php"; ?>
<?php include "../konektor.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="../icons/hp.png">
	<title>BEM | Petugas</title>
	<?php include "../cdn.php"; ?>
	<?php include "../theme/temapetugas.php"; ?>
	<style>
		body {
			background-color: #fff2cc;
		}

		@media screen and (max-width: 992px) {
			body {
				padding: 10px;
			}

			.petugas .row {
				margin-top: -10px;
			}
		}
	</style>
</head>

<body>

	<?php include "../navbar/navbarpetugas.php"; ?>
	<div class="container petugas">

		<?php include '../pesan/pesanpetugas.php'; ?>

		<h3 class="focus-in-contract">Data Petugas</h3>
		<hr>

		<div class="row">
			<div class="col-sm-2 mb-2"><a class="btn btn-sm tambahpetugas" href="#" data-toggle="modal" data-target="#myModalinsert">Tambah Data&nbsp;<i class="material-icons" style="font-size:16px">&#xe145;</i></a></div>
			<div class="col-sm-10 mt-1"><input class="form-control" id="myInput" type="text" placeholder="Cari.."></div>
		</div>
		<br>
		<?php
		$data = mysqli_query($konektor, "SELECT * FROM petugas");
		if (mysqli_num_rows($data) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-sm bg-white" id="myTable">
					<thead>
						<tr style="text-align: center; background-color:#FFFDD0;">
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Telepon</th>
							<th>Email</th>
							<th>Pilihan</th>
							<th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$data = mysqli_query($konektor, "select * from petugas");
						while ($d = mysqli_fetch_array($data)) {
						?>
							<tr>
								<td align="center"><?php echo $no++; ?></td>
								<td><?php echo $d['nama']; ?></td>
								<td><?php echo $d['alamat']; ?></td>
								<td align="center"><?php echo $d['telepon']; ?></td>
								<td><?php echo $d['email']; ?></td>
								<td align="center">
									<?php
									$berkas = $d['idpetugas'];
									if (file_exists("foto/$berkas.jpg")) {
									?>
										<a target="_blank" href="foto/<?php echo $d['idpetugas']; ?>.jpg"><i class="material-icons bukafotopetugas" style="font-size:18px;color:green">&#xe873;</i></a>&nbsp;
										<a href="../delete/hapus1.php?idpetugas=<?php echo $d['idpetugas'] ?>" onclick="return confirm('Yakin ingin menghapus foto ini?')"><i class="material-icons" style="font-size:18px;color:red">&#xe92b;</i></a>
									<?php
									} else { ?>
										<a href="#" data-toggle="modal" data-target="#myModaliim<?php echo $d['idpetugas'] ?>"><i class="material-icons addfotopetugas" style="font-size:18px">&#xe864;</i></a>
									<?php } ?>
								</td>
								<td align="center">
									<?php
									$file = $d['idpetugas'];
									if (file_exists("foto/$file.jpg")) {
									?>
										<img src="foto/<?php echo $d['idpetugas']; ?>.jpg" width="80" height="80" />
									<?php } else {
									?>
										<img src="foto/kosong.jpg" width="80" height="80" />
									<?php } ?>
								</td>
								<td align="center">
									<a class="btn btn-sm ubahpetugas" href="#" data-toggle="modal" data-target="#myModalupdate<?php echo $d['idpetugas'] ?>">Ubah</a>

									<?php
									$idpetugas = $d['idpetugas'];
									$datap = mysqli_query($konektor, "SELECT * from transaksi where idpetugasterima like '$idpetugas' or idpetugasserah like '$idpetugas'");
									if (!mysqli_num_rows($datap) > 0) { ?>
										<a class="btn btn-sm hapuspetugas" href="../delete/deletepetugas.php?idpetugas=<?php echo $d['idpetugas'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
									<?php } else { ?>
										<a class="btn btn-sm btn-secondary hapuspetugas1">Hapus</a>
									<?php } ?>
								</td>
							</tr>


							<!-- Modal Unggah foto -->
							<div class="modal fade" id="myModaliim<?php echo $d['idpetugas']; ?>">
								<div class="modal-dialog modal-md">
									<div class="modal-content">

										<!-- Header -->
										<div class="modal-header">
											<h4 class="modal-tittle">Tambah Foto</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Body -->
										<div class="modal-body">
											<form action="../insert/unggahaksi1.php" method="post" enctype="multipart/form-data">
												<input type="hidden" name="idpetugas" value="<?php echo $d['idpetugas']; ?>">
												<input required type="file" class="form-control" name="berkas"><br>
										</div>

										<!-- Footer -->
										<div class="modal-footer">
											<button class="btn btn-info" type="submit">Unggah</button></form>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
										</div>
									</div>
								</div>
							</div>

							<!-- The Modal -->
							<div class="modal fade" id="myModalupdate<?php echo $d['idpetugas'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- Modal Header -->
										<div class="modal-header">
											<h4 class="modal-tittle">Ubah Data Petugas</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<!-- Modal Body -->
										<div class="modal-body">
											<form method="post" action="../update/updatepetugas.php">

												<!-- Edit text field -->
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<span class="input-group-text">Nama</span>
													</div>
													<input type="text" class="form-control" required name="nama" value="<?php echo $d['nama'] ?>">
												</div>

												<!-- Edit text field -->
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<span class="input-group-text">Alamat</span>
													</div>
													<input type="text" class="form-control" required name="alamat" value="<?php echo $d['alamat'] ?>">
												</div>

												<!-- Edit text field -->

												<input type="hidden" name="telepon" value="<?php echo $d['telepon'] ?>">


												<!-- Edit text field -->

												<input type="hidden" name="email" value="<?php echo $d['email'] ?>">


												<!-- Edit text field -->
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<span class="input-group-text">Password</span>
													</div>
													<input type="password" class="form-control" required name="password" value="<?php echo $d['password'] ?>">
												</div>
												<input type="hidden" name="idpetugas" value="<?php echo $d['idpetugas'] ?>">

												<!-- Modal Footer -->
												<div class="modal-footer">
													<!-- Input button -->
													<input type="submit" class="btn modalsimpan" value="Simpan">
											</form>
											<button type="button" class="btn modaltutup" data-dismiss="modal">Tutup</button>
										</div>


									</div>
								</div>
							</div>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<?php } else {
			echo "<div class='alert alert-info text-center'><i style='font-size:17px' class='fa'>&#xf05a;</i> Data Tidak Tersedia</div>";
		?>
		<?php } ?>

		<script>
			$(document).ready(function() {
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>

		<!-- The Modal -->
		<div class="modal fade" id="myModalinsert">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form method="post" action="../insert/insertpetugas.php">

							<!-- Input Text Field-->
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">Nama</span>
								</div>
								<input type="text" class="form-control" required name="nama">
							</div>

							<!-- Input Text Field-->
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">Alamat</span>
								</div>
								<input type="text" class="form-control" required name="alamat">
							</div>

							<!-- Input Text Field-->
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">Telepon</span>
								</div>
								<input type="number" class="form-control" required name="telepon">
							</div>

							<!-- Input Text Field-->
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">Email</span>
								</div>
								<input type="email" class="form-control" required name="email">
							</div>

							<!-- Input Text Field-->
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text">Password</span>
								</div>
								<input type="password" class="form-control" required name="password">
							</div>


					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<!-- Input Button-->
						<input class="btn modalsimpan" type="submit" value="Simpan"></form>
						<button type="button" class="btn modaltutup" data-dismiss="modal">Tutup</button>
					</div>

				</div>
			</div>
		</div>
	</div>


</body>

</html>