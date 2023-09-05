<section class="blog" id="blog">
	<div class="container">
		<div class="heading">
			<h3>Artikel</h3>
		</div>
		<div class="blog-grids">
			   <?php 
            $no =1;
            $artikel=$koneksi->query("SELECT * FROM artikel   order by id_artikel desc");
            while($martikel=mysqli_fetch_array($artikel)){
            	$isi = substr($martikel['keterangan'],0,50)
                   
          ?> 
		<div class="col-md-4 blog-grid">
			<a href="#" data-toggle="modal" data-target="#myModal<?= $martikel['id_artikel'];?>"><img src="images/artikel/<?= $martikel['foto'];?>" style="width: 300px; height: 300px;" alt="" /></a>
			<h5><?= tgl_indonesia($martikel['tgl']);?></h5>
			<h4><a href="#" data-toggle="modal" data-target="#myModal<?= $martikel['id_artikel'];?>"><?= $martikel['judul'];?></a></h4>
			<p> <?= $isi;?>.<div class="readmore-w3">
				<a class="readmore" href="#" data-toggle="modal" data-target="#myModal<?= $martikel['id_artikel'];?>">Lihat</a>
			</div></p>
			
		</div> <?php }?>


		
		<div class="clearfix"></div>
		</div>
	</div>
</section>