<?php  
        $sql_cek = "SELECT * FROM tentangkami  WHERE  id_tentang='1'";
        $query_cek = $koneksi->query( $sql_cek);
        $tentangkami = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="typography">
				<div class="container">
							<h3 class="agileits-icons-title">Tentang Kami	 <center><img src="images/tentangkami/<?= $tentangkami['foto'];?>" alt="" class="img-responsive" style="width: 300px;"/></center>	</h3>
				
			
						<div class="well">

						<?= $tentangkami['keterangan'];?>
						</div>
			
				
					
				</div>
</div>
