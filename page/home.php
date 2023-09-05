<!-- bootstrap-modal-pop-up -->

<?php include"tampilan/slider.php";?>
<?php include"page/modal.php";?>
<!-- //bootstrap-modal-pop-up --> 
<!-- banner-bottom -->

<!-- //banner-bottom -->

<!-- team -->
	<div class="team" id="team" style="background-color:#2defd4;">
		<div class="container">
		<div class="heading">
			<h3>Kepala Bidang Pengaduan</h3>
		</div>
			<div class="wthree_team_grids">
				 <?php 
            $no =1;
            $kabid=$koneksi->query("SELECT * FROM kabid as a,bidang as b where a.id_bidang=b.id_bidang  order by a.id_kabid desc");
            while($mkabid=mysqli_fetch_array($kabid)){
                   
          ?> 
				<div class="col-md-3 wthree_team_grid">
					<div class="hovereffect">
						<img src="images/kabid/<?php echo $mkabid['foto'];?>" style="width: 300px;height: 300px;" alt=" " class="img-responsive" />
						<div class="overlay">
							<h6><?php echo $mkabid['nama'];?></h6>
							
						</div>
					</div>
					<h4><?php echo $mkabid['nip'];?></h4>
					<p><?php echo $mkabid['nama_bidang'];?></p>
				</div>
				<?php }?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //team -->

<!-- Clients -->
	
<!-- //Clients -->
<!-- Counter -->

