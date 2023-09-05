		

		 <div class="modal video-modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Login
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
								<div class="banner-form-agileinfo">
									
									<form action="?page=page/login" method="post" enctype="multipart/form-data">
										<input type="text" class="form-control" name="username" placeholder="Username" required="">
										<input type="password" class="form-control" name="password" placeholder="Password" required="">
										
										
										
										<input type="submit" class="hvr-shutter-in-vertical" value="Login"> <br><p></p>
										<label style="color: white;">Belum Punya Akun? Silahkan <a href="#" data-toggle="modal" data-target="#register" class="btn btn-success">Register</a></label> 	
									</form>
								</div>
							
					</div>
			</div>
		</div>
	</div>

		 <div class="modal video-modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Registerasi
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
								<div class="banner-form-agileinfo">
									
									<form action="?page=page/registerasi" method="post" enctype="multipart/form-data">
										<input type="text" class="form-control" name="nik" placeholder="nik" required="">
										<input type="text" class="form-control" name="nama" placeholder="Nama" required="">
										<input type="text" class="form-control" name="username" placeholder="Username" required="">
										<input type="password" class="form-control" name="password" placeholder="Password" required="">
										<input type="text" class="form-control" name="no_hp" placeholder="no_hp" required="">
										<label>Surat SK Jabatan (PDF) <input type="file" class="form-control" name="suratrekom" placeholder="" required=""></label>
										<label>Foto KTP (PNG/JPG) <input type="file" class="form-control" name="ktp" placeholder="" required=""></label>
										<label>Foto (PNG/JPG)<input type="file" class="form-control" name="foto" placeholder="" required=""></label>
										
										
										
										<input type="submit" class="hvr-shutter-in-vertical" value="Registerasi"> 	
									</form>
								</div>
							
					</div>
			</div>
		</div>
	</div>

	 <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Form Pengaduan
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
								<div class="banner-form-agileinfo">
									<?php if(empty($_SESSION['id'])){?> 
										Silahkan Login, Untuk melakukan pengaduan !!!!<?php }else{
								?>
									<form action="?page=page/inputpengaduan" method="post" enctype="multipart/form-data">
										<input type="text" class="email" name="judul" placeholder="Enter Judul Pengaduan" required="">
										
										
										<textarea class="form-control option-w3ls" name="keterangan" placeholder="Enter Keterangan Pegaduan" required=""></textarea>
										<label>Foto Pengaduan (PNG/JPG) <input type="file" class="form-control" name="file"  required=""></label><p></p>
										<input type="submit" name="simpan" class="hvr-shutter-in-vertical" value="Kirim">  	
									</form>
								<?php }?>
								</div>
							
					</div>
			</div>
		</div>
	</div>
	 <?php 
            $no =1;
            $artike=$koneksi->query("SELECT * FROM artikel   order by id_artikel desc limit 3");
            while($martike=mysqli_fetch_array($artike)){
                   
          ?> 
          <div class="modal video-modal fade" id="myModal<?= $martike['id_artikel'];?>" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Detail Artikel
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><p>						
				</div>
					<div class="modal-body" style="background-color:blue;">
								<div class="banner-form-agileinfo">
								<center><h2 style="color:white;"><?= $martike['judul'];?></h2><br>	<img src="images/artikel/<?= $martike['foto'];?>" style="width: 400px; height: 400px;" alt="" />
									<br><p><?= $martike['keterangan'];?></p></center>
								</div>
							
					</div>
			</div>
		</div>
	</div>
	<?php }?>