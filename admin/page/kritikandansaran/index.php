<div class="main-panel">
          <div class="content-wrapper">
           
            
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Keritikan dan Saran</h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal -  Jam</th>
                                            <th>Keritikan dan Saran</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal -  Jam</th>
                                            <th>Keritikan dan Saran</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $bidang=$koneksi->query("SELECT * FROM kritikandansaran   order by id_kritikan desc");
            while($m=mysqli_fetch_array($bidang)){
                   
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nama'];?></td>
                                 <td><?php echo $m['email'];?></td>
                                 <td><?php echo tgl_indonesia($m['tgl']);?> - <?php echo $m['jam'];?></td>
                                 <td><?php if($m['status']=='Baru'){?><a href="?page=page/kritikandansaran/detail&id=<?php echo $m['id_kritikan'];?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="mdi mdi-book-open"></i>
                                    </a><?php }else{ echo $m['kritikan'];}?></td>
                                <td>
                                    
                                     <a href="?page=page/kritikandansaran/hapus&id=<?php echo $m['id_kritikan'];?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="mdi mdi mdi-delete-forever"></i>
                                    </a></td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

  
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php include"tampilan/footer.php";?>
          <!-- partial -->
        </div>