  <?php  
       
        $admi=$koneksi->query("SELECT * FROM kabid where id_kabid='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);
        $sql_cek=$koneksi->query("SELECT * FROM pengaduan as p, user as u where p.id_user=u.id_user and p.id_pengaduan='$_GET[id]'");
        
        $data_cek = mysqli_fetch_array($sql_cek,MYSQLI_BOTH);

    
  ?>
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card" >
                <div class="card">
                  <div class="card-body" style="background-color: #00ffc43b;">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800">Detail Pengaduan</h1></h4>
                   
                    <form class="user" action="" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="id" value="<?=$data_cek['id_pengaduan'];?>">
                                
<table class="table table-striped">
  <tr>
    <td width="5%">NIK</td>
    <td width="40%">: <?= $data_cek['nik'];?></td>
  </tr>
  <tr>
    <td width="5%">Nama</td>
    <td width="40%">: <?= $data_cek['nama'];?></td>
  </tr>
  <tr>
    <td width="5%">No Hp</td>
    <td width="40%">: <?= $data_cek['nik'];?></td>
  </tr>
  <tr>
    <td width="5%">Foto</td>
    <td width="40%">: <img  src="../images/user/<?= $data_cek['foto'];?>" style="padding: 20 rem;
  background-color: white;
  border: 1px solid #;
  border-radius: 0.25rem;
  max-width: 100%;
  height: auto; width: 300px;" ></td>
  </tr>
  <tr>
    <td width="5%">KTP</td>
    <td width="40%">: <img  src="../images/ktp/<?= $data_cek['ktp'];?>" style="padding: 20 rem;
  background-color: white;
  border: 1px solid #;
  border-radius: 0.25rem;
  max-width: 100%;
  height: auto; width: 300px;" ></td>
  </tr>
  <tr>
    <td width="5%">Surat SK <br>Jabatan</td>
    <td width="40%">: <iframe src="../images/surat/<?= $data_cek['suratrekom'];?>" width="400px" height="400px"></iframe><a href="../images/surat/<?= addslashes($data_cek['suratrekom']);?>" target="_blank">
                          <button type="button" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-download btn-icon-prepend"></i> Download </button></a></td>
  </tr>
  <tr>
    <td width="5%">Judul Pengaduan</td>
    <td width="40%"> <textarea style="width: 400px ; background-color: powderblue;" > : <?= $data_cek['judul'];?> </textarea> </td>
  </tr>
  <tr>
    <td width="5%">Keterangan Pengaduan</td>
    <td width="40%"> <textarea style="width: 400px ; background-color: powderblue;" > : <?= $data_cek['keterangan'];?> </textarea> </td>
  </tr>
  
  <tr>
    <td width="5%">File Pengaduan</td>
    <td width="50%">: <iframe src="../images/pengaduan/<?= $data_cek['file'];?>" width="400px" height="400px"></iframe><a href="../images/pengaduan/<?= $data_cek['file'];?>" target="_blank">
                          <button type="button" class="btn btn-outline-danger btn-icon-text"><i class="mdi mdi-download btn-icon-prepend"></i> Download </button></a></td>
  </tr>
  <?php if($_SESSION['level']=='Administrator' && $data_cek['status']=='Sedang di Proses Oleh Admin'){?>
  <tr>
    <td width="5%">Teruskan Pengaduan Ke</td>
    <td width="40%"> <select type="text"  name="id_bidang" class="form-control" id="exampleInputName1" >
                  <?php if(empty($data_cek['id_bidang'])){?>        <option>Pilih</option><?php }else{
                    $abc=$koneksi->query("SELECT * FROM bidang where id_bidang='$data_cek[id_bidang]'");
        
        $adb = mysqli_fetch_array($abc,MYSQLI_BOTH);

        ?><option value="<?= $adb['id_bidang'];?>"><?= $adb['nama_bidang'];?></option>
                                    <?php } 
            $no =1;
            $kabid=$koneksi->query("SELECT * FROM bidang  order by id_bidang desc");
            while($m=mysqli_fetch_array($kabid)){
                   
          ?> 
          <option value="<?= $m['id_bidang'];?>"><?= $m['nama_bidang'];?></option>
        <?php } ?>
                        </select>
                      </td>
  </tr><?php }elseif($_SESSION['level']=='Admin Bidang' && $data_cek['status']=='Sedang di Proses Oleh Admin Bidang'){?>
  <tr>
    <td width="5%">Verifikasi Pengaduan</td>
    <td width="40%"> 


        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Catatan Diterima</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
<textarea  name="catatan" style="width:450px;height: 200px;" placeholder="Enter Catatan diterima"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
 <div class="modal" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-header">
                        <h4 class="modal-title">Alasan Ditolak</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">
<textarea  name="alasan" style="width:450px;height: 200px;" placeholder="Enter Alasan Ditolak"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    <div class="col-sm-4">
                              <div class="form-check">
                               
                               
                            <label class="form-check-label" data-toggle="modal" data-target="#myModal1">
                                  <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="di Terima" required=""> Diterima </label>
                                
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label"  data-toggle="modal" data-target="#myModal2">
                                  <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="di Tolak"required> Ditolak </label>
                              </div>
                            </div>
                          </div>
                        </td>
  </tr> 
  
 
   <?php }elseif($_SESSION['level']=='Kepala Bidang' && $data_cek['status']=='Sedang di Proses Oleh Kepala Bidang'){ ?>
   <tr>
    <td width="5%">Verifikasi Pengaduan</td>
    <td width="40%"><div class="col-sm-4">
                              <div class="form-check">
                               
                               
                            <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="di Terima" required=""> Diterima </label>
                                
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="di Tolak"required> Ditolak </label>
                              </div>
                            </div>
                          </div>
                        </td>
  </tr> 
   <tr>
    <td width="5%">Upload Bukti Tindak<br> Lanjut Berupa Gambar</td>
    <td width="40%"><div class="form-group">
                        
                        <input type="file" name="file" class="file-upload-default" style="background-color: white;">
                         <div class="input-group col-xs-12">
                         
                          <input type="text" name="file" class="form-control file-upload-info" disabled placeholder="">
                          <span class="input-group-append">
                            <button name="file"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                        </td>
  </tr>
  <tr>
    <td width="5%">Alasan di Tolak</td>
    <td width="40%">  <textarea class="form-control" name="alasan" placeholder="Enter Alasan di Tolak"></textarea></td>
  </tr>
    <?php }else{}?>
  
</table>
                     
                       <?php if($_SESSION['level']=='Administrator' && $data_cek['status']=='Sedang di Proses Oleh Admin'){?>
                        <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Kirim</button>
                      <a href="?page=page/pengaduan/index&status=<?= $data_cek['status'];?>"class="btn btn-light">Cancel</a>
<?php }elseif($_SESSION['level']=='Admin Bidang' && $data_cek['status']=='Sedang di Proses Oleh Admin Bidang'){?>
  <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Kirim</button>
                      <a href="?page=page/pengaduan/index&status=<?= $data_cek['status'];?>"class="btn btn-light">Cancel</a>
<?php }elseif($_SESSION['level']=='Kepala Bidang' && $data_cek['status']=='Sedang di Proses Oleh Kepala Bidang'){ ?><button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Kirim</button>
                      <a href="?page=page/pengaduan/index&status=<?= $data_cek['status'];?>"class="btn btn-light">Cancel</a>
 <?php }else{?><a href="?page=page/pengaduan/index&status=<?= $data_cek['status'];?>"class="btn btn-danger">Kembali</a><?php }?>
                      
                      
                    </form>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         <?php include"tampilan/footer.php";?>
          <!-- partial -->
        </div>

  
<?php 

if (isset($_POST['simpan'])){

if($_SESSION['level']=='Administrator'){
  $id_bidang = $_POST['id_bidang'];
  $alasan = addslashes($_POST['alasan']);
    $koneksi->query("UPDATE pengaduan SET 
                    id_bidang     = '$id_bidang',
                    status='Sedang di Proses Oleh Admin Bidang'
                    WHERE id_pengaduan = '$_POST[id]'");
 echo"<script>alert('Selamat Data Berhasil di Teruskan!!!'); window.location = '?page=page/pengaduan/index&status=$data_cek[status]'</script>";
    }elseif($_SESSION['level']=='Admin Bidang'){
       
    $status = $_POST['status'];
  $alasan = addslashes($_POST['alasan']);
  $catatan = addslashes($_POST['catatan']);
    $koneksi->query("UPDATE pengaduan SET 
                    status     = '$status',
                    catatan     = '$catatan',
                    alasan = '$alasan'
                    WHERE id_pengaduan = '$_POST[id]'");
  echo"<script>alert('Selamat Data Berhasil di Verifikasi!!!'); window.location = '?page=page/pengaduan/index&status=$data_cek[status]'</script>";

  
   }else{
      $foto   = $_FILES['file']['name'];
      move_uploaded_file($_FILES['file']['tmp_name'],'../images/bukti/'.$foto);
     $status = $_POST['status'];
  $alasan = addslashes($_POST['alasan']);
    $koneksi->query("UPDATE pengaduan SET 
                    status     = '$status',
                    bukti     = '$foto',
                    alasan = '$alasan'
                    WHERE id_pengaduan = '$_POST[id]'");
echo"<script>alert('Selamat Data Berhasil $status!!!'); window.location = '?page=page/pengaduan/index&status=$data_cek[status]'</script>";
   
  }
  
 }



 ?>