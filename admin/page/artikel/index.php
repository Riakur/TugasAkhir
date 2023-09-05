<div class="main-panel">
          <div class="content-wrapper">
           
            
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/artikel/tambah&id=Tambah Data Artikel"><button class="btn btn-success">Tambah artikel</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            $artikel=$koneksi->query("SELECT * FROM artikel   order by id_artikel desc");
            while($m=mysqli_fetch_array($artikel)){
                   
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['judul'];?></td>
                                 <td><?php echo $m['keterangan'];?></td>
                                 <td><?php echo tgl_indonesia($m['tgl']);?>-<?php echo $m['jam'];?></td>
                                  <td><img src="../images/artikel/<?php echo $m['foto'];?>" height="50"></td>
                                <td>
                                    <a href="?page=page/artikel/edit&id=<?php echo $m['id_artikel'];?>&data=Edit artikel" class="btn btn-success btn-circle btn-sm">
                                        <i class="mdi mdi-check"></i>
                                    </a>
                                     <a href="?page=page/artikel/hapus&id=<?php echo $m['id_artikel'];?>" class="btn btn-danger btn-circle btn-sm">
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