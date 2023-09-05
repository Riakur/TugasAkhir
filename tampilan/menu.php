<?php include 'page/modal.php';?><div class="header">
		<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<center></center>
					</div>
					<div class="top-nav-text">
						<div class="nav-contact-w3ls"></div> 
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" >
							<li><img src="images/LOGO.png" width="250px" height="auto"></li>
							<li ><a class="hvr-underline-from-center active" style="color:black;" href="index.php">Home</a></li>
							<li><a href="?page=page/tentangkami" class="hvr-underline-from-center" style="color:black;">Tentang Kami</a></li>
							<li><a href="?page=page/alurpengaduan" class="hvr-underline-from-center" style="color:black;">Alur Pengaduan</a></li>
							
							<li><a href="#" data-toggle="dropdown" style="color:black;"><span data-hover="ShortCodes">Data Pengaduan</span><span class="caret"></span></a>
								<ul class="dropdown-menu">
									
									<li><a href="?page=page/hasilpengaduan&status=di Terima" style="color:black;"><span data-hover="Icons" >Pengaduan Diterima</span></a></li>
									<li><a href="?page=page/hasilpengaduan&status=di Tolak"style="color:black;"><span data-hover="Typograpghy">Pengaduan Ditolak</span></a></li>
								</ul>
							</li>
							<?php if(empty($_SESSION['id'])){}else{?>
							<li><a href="#" data-toggle="dropdown" style="color:black;"><span data-hover="ShortCodes">Pengaduan</span><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?page=page/pengaduan" style="color:black;"><span data-hover="Icons" >Pengaduan Saya</span></a></li>
									<li><a href="?page=page/pengaduanditerima" style="color:black;"><span data-hover="Icons" >Pengaduan Diterima</span></a></li>
									<li><a href="?page=page/pengaduanditolak"style="color:black;"><span data-hover="Typograpghy">Pengaduan Ditolak</span></a></li>
								</ul>
							</li>	<?php }?>
							<li><a href="?page=page/kontakkami" class="hvr-underline-from-center"style="color:black;">Kontak Kami</a></li>
							<?php if(empty($_SESSION['id'])){?> 
								<li><a href="#" data-toggle="modal" data-target="#login" class="hvr-underline-from-center"style="color:black;">Login</a></li>
								<li><a href="#" data-toggle="modal" data-target="#register" class="hvr-underline-from-center"style="color:black;">Register</a></li>

						<?php }else{
								?>
								<li><a href="?page=page/logout" class="hvr-underline-from-center"style="color:black;">Logout</a></li>
							
						<?php }?>
						</ul>
					</div>

					<div class="clearfix"> </div>	
				</nav>
	
	</div>