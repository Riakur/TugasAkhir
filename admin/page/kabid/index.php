<div class="main-panel">
          <div class="content-wrapper">
           
            
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="?page=page/kabid/tambah&id=Tambah Data Kepala Bidang Pengaduan"><button class="btn btn-success">Tambah <?php echo $_GET['id'];?></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP </th>
                                            <th>Nama </th>
                                            <th>Jabatan </th>
                                            <th>Username</th>
                                            <th>Bidang Pengaduan</th>
                                            <th>No Hp</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>No</th>
                                            <th>NIP </th>
                                            <th>Nama </th>
                                            <th>Jabatan </th>
                                            <th>Username</th>
                                            <th>Bidang Pengaduan</th>
                                            <th>No Hp</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                         <?php 
            $no =1;
            if($_SESSION['level']=='Admin Bidang'){
                $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                 $admin=$koneksi->query("SELECT * FROM kabid as a,bidang as b where a.id_bidang=b.id_bidang  and a.id_bidang='$mbi[id_bidang]'  order by a.id_kabid desc");
            
            }else{
                $admin=$koneksi->query("SELECT * FROM kabid as a,bidang as b where a.id_bidang=b.id_bidang  order by a.id_kabid desc");
             
            }
           while($m=mysqli_fetch_array($admin)){
                   
          ?> 
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $m['nip'];?></td>
                                 <td><?php echo $m['nama'];?></td>
                                 <td><?php echo $m['jabatan'];?></td>
                                 <td><?php echo $m['username'];?></td>
                                 <td><?php echo $m['nama_bidang'];?></td>
                                 <td><?php echo $m['no_hp'];?></td>
                                  <td><img src="../images/kabid/<?php echo $m['foto'];?>" height="50"></td>
                                <td>
                                    <a href="?page=page/kabid/edit&id=<?php echo $m['id_kabid'];?>&data=Edit Kepala Bidang Pengaduang" class="btn btn-success btn-circle btn-sm">
                                        <i class="mdi mdi-check"></i>
                                    </a>
                                     <a href="?page=page/kabid/hapus&id=<?php echo $m['id_kabid'];?>" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini ?');" class="btn btn-danger btn-circle btn-sm">
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