<div class="typography" style="background-color:#f3c18e8c;">
				<div class="container">
						
					<h3 class="hdg">Pengaduan <?= $_GET['status']?></h3>
					
					<div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s" style="background-color:#18b9e98c;">
						<table class="table table-striped" border="1">
							<thead>
								<tr>
									<th >No</th>
									<th>Judul Pengaduan</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
									<th>File Pengaduan</th>
									<th>Status</th>
									
									<?php if($_GET['status']=='di Tolak'){?><th>Alasan di Tolak</th><?php }else{?><th>Catatan Pengaduan</th><?php }?>
								</tr>
							</thead>
								<?php 
								$no=1;
								$pe=$koneksi->query("SELECT * FROM pengaduan where status='$_GET[status]' and  id_user='$_SESSION[id]'  order by tgl_pengaduan desc");
								while ($peng=mysqli_fetch_array($pe)) {
									$bidan=$koneksi->query("SELECT * FROM bidang  where id_bidang='$peng[id_bidang]'");
            $mbi=mysqli_fetch_array($bidan);
            $usera=$koneksi->query("SELECT * FROM user  where id_user='$peng[id_user]'");
            $user=mysqli_fetch_array($usera);
            if($peng['status']=='di Terima'){
            	?>
            	<tr>
									<td><?= $no;?></td>
									<td><?= $peng['judul'];?></td>
									<td><?= tgl_indonesia($peng['tgl_pengaduan']);?></td>
									<td><?= $peng['keterangan'];?></td>
									<td><a href="images/pengaduan/<?= $peng['file'];?>" target="_blank">
                          <button type="button" class="btn btn-outline-danger btn-icon-text"><i class="fa fa-download"></i> Download </button></a></td>
									<td><?=$peng['status'];?></td>
									<td><?php if($peng['status']=='di Terima'){?><?= $peng['catatan'];?>
                          <?php }else{ echo $peng['alasan']; }?></td>
									
								</tr>
            	<?php
            }elseif($peng['status']=='di Tolak'){?>
<tr>
									<td><?= $no;?></td>
									<td><?= $peng['judul'];?></td>
									<td><?= tgl_indonesia($peng['tgl_pengaduan']);?></td>
									<td><?= $peng['keterangan'];?></td>
									<td><a href="images/pengaduan/<?= $peng['file'];?>" target="_blank">
                          <button type="button" class="btn btn-outline-danger btn-icon-text"><i class="fa fa-download"></i> Download </button></a></td>
									<td><?=$peng['status'];?></td>
									<td><?php if($peng['status']=='di Terima'){?><?= $peng['catatan'];?>
                          <?php }else{ echo $peng['alasan']; }?></td>
									
								</tr>
            <?php }else{}
								?>
								
								<?php $no++; } ?>
								
						
						</table>
					</div>
				</div>
</div>
<?php include"modalpengaduan.php";?>