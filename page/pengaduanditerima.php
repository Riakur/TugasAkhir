<div class="typography" style="background-color:#f3c18e8c;">
				<div class="container">
						
					<h3 class="hdg">Pengaduan di Terima</h3>
					
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
									<th>Aksi</th>
								</tr>
							</thead>
								<?php 
								$no=1;
								$pe=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_user='$_SESSION[id]' and p.status='di Terima'   order by tgl_pengaduan desc");
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
									<td>
												<a href="#" data-toggle="modal" data-target="#lihat<?php echo $peng['id_pengaduan'];?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <div class="modal video-modal fade" id="lihat<?= $peng['id_pengaduan'];?>" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Lihat Pengaduan
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
								<div class="banner-form-agileinfo" style=" font-size:16px;">
										<table class="table table-striped">
										<tr>
											<td>Tanggal Pengaduan</td>
											
											<td>: <?= tgl_indonesia($peng['tgl_pengaduan']);?></td>
										</tr>
										<tr>
											<td>Judul</td>
											<td>: <?= $peng['id_pengaduan'];?></td>
										</tr>
										<tr>
											<td>Keterangan Pengaduan</td>
											<td>: <?= $peng['keterangan'];?></td>
										</tr>
										<tr>
											<td>Dokumen Pengaduan</td>
											<td><iframe src="images/pengaduan/<?= $peng['file'];?>" width="300px"></iframe></td>
										</tr>

										<tr>
											<td>Status Pengaduan</td>
											<td>: <?= $peng['status'];?></td>
										</tr>
										<tr>
											<td>Bukti Pengaduan Diterima</td>
											<td><img src="images/bukti/<?= $peng['bukti'];?>" width="300px"></td>
										</tr>
									</table>
								
									</form>
								
								</div>
							
					</div>
			</div>
		</div>
	</div>
                                     <a href="?page=page/hapuspengaduan&id=<?php echo $peng['id_pengaduan'];?>" class="btn btn-danger btn-circle btn-sm" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini ?');" >
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