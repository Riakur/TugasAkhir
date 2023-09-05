<div class="slider">
	<div class="callbacks_container">

		<ul class="rslides" id="slider">
			   <?php 
            $no =0;
            $slider=$koneksi->query("SELECT * FROM slider order by id_slider desc");
            while($mslider=mysqli_fetch_array($slider)){
                   
          ?> 
			<li>
				<div class="w3layouts-banner-top<?php if($no== 0){}else{ echo $no;}?>" style="background: url(images/slider/<?php echo $mslider['foto'];?>) no-repeat 0px 0px;background-size: cover;	
	-webkit-background-size: cover;	
	-moz-background-size: cover;
	-o-background-size: cover;		
	-moz-background-size: cover;
	min-height:700px;">
					<div class="banner-dott">
					<div class="container">
						<div class="slider-info">
							<center><h2><?php echo $mslider['judul'];?></h2>
							
								<div class="w3ls-button"><br>
									<a href="#" data-toggle="modal" data-target="#myModal">Form Pengaduan</a>
								</div>
								</center>
						</div>
					</div>
					</div>
				</div>
			</li>
			 <?php 
                            $no++;
                            } ?>
			
		</ul>
	</div>
	<div class="clearfix"></div>
</div>