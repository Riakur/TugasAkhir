<div class="typography" style="background-color:#f3c18e8c;">
				<div class="container">
						
					<h3 class="hdg">Pengaduan di Tolak</h3>
					
					<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s" style="background-color:#18b9e98c;">
						<table class="table table-striped" border="1">
							<thead>
								<tr>
									<th >No</th>
									<th>Judul Pengaduan</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>Foto Pengaduan</th>
									<th>Status</th>
									<th>Alasan di Tolak</th>
									<th>Aksi</th>
								</tr>
							</thead>
								<?php 
								$no=1;
								$pe=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_user='$_SESSION[id]' and p.status='di Tolak'   order by tgl_pengaduan desc");
								while ($peng=mysqli_fetch_array($pe)) {
									$bidan=$koneksi->query("SELECT * FROM bidang  where id_bidang='$peng[id_bidang]'");
            $mbi=mysqli_fetch_array($bidan);
								?>
								<tr>
									<td><?= $no;?></td>
									<td><?= $peng['judul'];?></td>
									<td><?= tgl_indonesia($peng['tgl_pengaduan']);?></td>
									<td><?= $peng['keterangan'];?></td>
									<td><img src="images/pengaduan/<?= $peng['file'];?>" width="300px"></td>
									<td><?php if($peng['status']=='Baru'){ echo"Sedang Di Proses Oleh Admin $mbi[nama_bidang]";}else{ echo $peng['status'];}?></td>

									<td><?= $peng['alasan'];?></td>
									<td>
												<a href="#" data-toggle="modal" data-target="#peng<?php echo $peng['id_pengaduan'];?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fa fa-check"></i>
                                    </a>
                                     <a href="?page=page/hapuspengaduan&id=<?php echo $peng['id_pengaduan'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini ?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
										</td>

									
								</tr>
								<?php $no++; } ?>
								
						
						</table>
					</div>
				</div>
</div>
<?php include"modalpengaduan.php";?>