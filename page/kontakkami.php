  <?php  
        $sql_cek = "SELECT * FROM kontak  WHERE  id_kontak='1'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="w3ls_address_mail_footer_grids">
	<div class="heading">
		<h2>Kontak Kami</h2>
	</div>
	<div class="container">
		
			<div style="background-color: seagreen;" class="col-md-6 contact-form">
				<h4 style="text-align: center;" class="white-w3ls">Keritikan & Saran <span></span></h4>
				<form action="" method="post" enctype="multipart">
					<div class="styled-input agile-styled-input-top">
						<input style="background-color : white;" type="text" name="nama" required="">
						<label> <b>Nama</b> </label>
						<span></span>
					</div>
					<div class="styled-input">
						<input style="background-color : white;" type="email" name="email" required=""> 
						<label> <b>Email</b> </label>
						<span></span>
					</div> 
					
					<div class="styled-input">
						<textarea style="background-color : white;" name="kritikan" required=""></textarea>
						<label> <b>Keritikan dan Saran</b> </label>
						<span></span>
					</div>	 
					<input type="submit" name="simpan" value="KIRIM">
				</form>
			</div>
			<div class="col-md-6 contactright">
				<h3>Contact Address</h3>
				<div class="w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<p><?= $data_cek['alamat'];?></p>
				</div>
				<div class="w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<p><?= $data_cek['telp'];?> <span>+62<?= $data_cek['whatsapp'];?></span></p>
				</div>
				<div class="w3ls_footer_grid_left">
					<div class="wthree_footer_grid_left">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
					</div>
					<p><a href="mailto:<?= $data_cek['email'];?>"><?= $data_cek['email'];?></a> </p>
				</div>
			</div>
			<div class="clearfix"> </div>
	</div>
</div>
<?php

    if (isset ($_POST['simpan'])){
        $kritikan=addslashes($_POST['kritikan']);
        $nama=addslashes($_POST['nama']);
        $email=addslashes($_POST['email']);

        $query_simpan =$koneksi->query( "INSERT INTO kritikandansaran SET 
        nama='$nama',
        email='$email',
        kritikan='$kritikan',
        tgl='$tgl_sekarang',
        jam='$jam_sekarang',
        status='Baru'
        ");
      
    if ($query_simpan) {
      echo"<script>alert('Terimakasih atas Keritikan dan Saran Anda !!!'); window.location = '?page=page/kontakkami'</script>";
      }else{
      echo"<script>alert('Keritikan dan Saran Anda  Gagal di Kirim !!!'); window.location = '?page=page/kontakkami'</script>";
    }}?>