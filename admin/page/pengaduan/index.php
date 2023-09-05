<div class="main-panel">
          <div class="content-wrapper">
           
            
    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pengaduan <?php if($_SESSION['level']=='Kepala Bidang'){
if($_GET['status']=='Sedang di Proses Oleh Kepala Bidang'){ echo "Baru";}else { echo $_GET['status']; }
}elseif($_SESSION['level']=='Admin Bidang'){
    if($_GET['status']=='Sedang di Proses Oleh Admin Bidang'){ echo "Baru";}else { echo $_GET['status']; }
}else{ if($_GET['status']=='Sedang di Proses Oleh Admin'){ echo "Baru";}else { echo $_GET['status']; }}
                    ?></h1>
                 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                         
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK Pengadu</th>
                                            <th>Nama Pengadu</th>
                                            <th>Judul Pengaduan</th>
                                            <th>Foto Pengaduan</th>
                                            <th><?php if($_GET['status']=='di Terima'){  echo "Catatan"; }elseif($_GET['status']=='di Tolak'){  echo"Alasan"; }else{ echo"keterangan"; }?></th>
                                            <th>Tgl Pengaduan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK Pengadu</th>
                                            <th>Nama Pengadu</th>
                                            <th>Judul Pengaduan</th>
                                            <th>Foto Pengaduan</th>
                                             <th><?php if($peng['status']=='di Terima'){  echo "Catatan"; }elseif($peng['status']=='di Tolak'){  echo"Alasan"; }else{ echo"keterangan"; }?></th>
                                            <th>Tgl Pengaduan</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                     <?php 
                                $no=1;
                                 if($_SESSION['level']=='Admin Bidang'){
                $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                                $pe=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_bidang='$mbi[id_bidang]' and p.status='$_GET[status]'   order by tgl_pengaduan desc");
                            }elseif($_SESSION['level']=='Kepala Bidang'){
                            $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
                                $pe=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_user='$mbi[id_bidang]' and p.status='$_GET[status]'   order by tgl_pengaduan desc");
                            }else{
$pe=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.status='$_GET[status]'   order by tgl_pengaduan desc");

                            }
                                while ($peng=mysqli_fetch_array($pe)) {
                                    $bidang=$koneksi->query("SELECT * FROM bidang  where id_bidang='$peng[id_bidang]'");
                        
            $mbing=mysqli_fetch_array($bidang);
                                ?>
                            <tr>
                                <th><?php echo $no;?></th>
                                 <td><?php echo $peng['nik'];?></td>
                                 <td><?php echo $peng['nama'];?></td>
                                 <td><?php echo $peng['judul'];?></td>
                                 <td><a href="../images/pengaduan/<?= $peng['file'];?>" target="_blank">
                          <button type="button" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-download btn-icon-prepend"></i> Download </button></a></td>

                                 <td><?php if($peng['status']=='di Terima'){?><?php echo $peng['catatan']; }elseif($peng['status']=='di Tolak'){?><?php echo $peng['alasan']; }else{ echo$peng['status']; }?></td>
                                 <td><?php echo tgl_indonesia($peng['tgl_pengaduan']);?></td>
                                <td>

                                    <a href="?page=page/pengaduan/detail&id=<?php echo $peng['id_pengaduan'];?>" class="btn btn-success btn-circle btn-sm">
                                        <i class="mdi mdi mdi-account-card-details"></i>
                                    </a>
                                    </td>
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