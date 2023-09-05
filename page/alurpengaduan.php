 <?php  
        $sql_cek = "SELECT * FROM alurpengaduan  WHERE  id_alur='1' ";
        $query_cek = $koneksi->query( $sql_cek);
        $alur = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="services" id="services">
		<div class="heading">
			<h2>Alur Pengaduan</h2>
		</div>
	<div class="container">
		<center><img  src="images/alurpengaduan/<?= $alur['file'];?>" ></div>
			
		</center>
	</div>
</div>