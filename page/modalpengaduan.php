	
<?php 
								$no=1;
								$peng=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_user='$_SESSION[id]'   order by tgl_pengaduan desc");
								while ($penga=mysqli_fetch_array($peng)) {
									$bida=$koneksi->query("SELECT * FROM bidang  where id_bidang='$penga[id_bidang]'");
            $mb=mysqli_fetch_array($bida); ?>

	 <div class="modal video-modal fade" id="peng<?= $penga['id_pengaduan'];?>" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Edit Pengaduan
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
								<div class="banner-form-agileinfo">
									
									<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" class="email" name="id" placeholder="Enter Judul Pengaduan" value="<?= $penga['id_pengaduan'];?>">
										<input type="text" class="email" name="judul" placeholder="Enter Judul Pengaduan" value="<?= $penga['judul'];?>">
										
										
										<textarea class="form-control option-w3ls" name="keterangan" placeholder="Enter Keterangan Pegaduan" required=""><?= $penga['keterangan'];?></textarea>
										<label style="color:white;"><iframe src="images/pengaduan/<?= $penga['file'];?>" width="300px"></iframe><br>Dokumen Pengaduan (PDF Max 2mb) <input type="file" class="form-control" name="file"  ></label><p></p>
										<input type="submit" name="simpan" class="hvr-shutter-in-vertical" value="Kirim">  	
									</form>
								
								</div>
							
					</div>
			</div>
		</div>
	</div>
	<?php }?>

 
  
<?php 

if (isset($_POST['simpan'])){

  $foto   = $_FILES['file']['name'];
  $pp = addslashes($_POST['judul']);
  $keterangan = addslashes($_POST['keterangan']);
  if (empty($foto)){
    $koneksi->query("UPDATE pengaduan SET 
                    judul     = '$pp',
                    status = 'Sedang di Proses Oleh Admin Bidang',
                    alasan = '',
                    keterangan    = '$keterangan'
                    WHERE id_pengaduan = '$_POST[id]'");
}else{


    $hapus= $koneksi->query("select * from pengaduan where id_pengaduan='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['file'];
    $hapus_foto="images/pengaduan/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['file']['tmp_name'],'images/pengaduan/'.$foto);
    $koneksi->query("UPDATE pengaduan SET judul     = '$pp',
                    keterangan    = '$keterangan',
                    status = 'Sedang di Proses Oleh Admin Bidang',
                    alasan = '',
                    file  = '$foto'
                    WHERE id_pengaduan= '$_POST[id]'");
  }
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/pengaduan'</script>";
    }



 ?>
