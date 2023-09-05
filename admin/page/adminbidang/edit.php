  <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM adminbidang as a, bidang as b WHERE  a.id_bidang=b.id_bidang and a.id_adminbidang='".$_GET['id']."'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
  ?>
  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['data'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?=$data_cek['id_adminbidang'];?>">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text"  name="nama" class="form-control" id="exampleInputName1" value="<?= $data_cek['nama'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">No Hp</label>
                        <input type="text" name="tlp" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['tlp'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username </label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['username'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password"class="form-control" id="exampleInputPassword4" value="<?= $data_cek['password'];?>">
                      </div>
                      <?php if($_SESSION['level']=='Admin Bidang'){
                $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);?>
                <input type="hidden" name=" id_bidang" value="<?= $mbi['id_bidang'];?>">
                <?php }else{ ?>
                       <div class="form-group">
                        <label for="exampleInputName1">Bidang Pengaduan</label>
                        <select type="text"  name="id_bidang" class="form-control" id="exampleInputName1" >
                          <option value="<?= $data_cek['id_bidang'];?>"><?= $data_cek['nama_bidang'];?></option>
                                    <?php 
            $no =1;
            $adminbidang=$koneksi->query("SELECT * FROM bidang  order by id_bidang desc");
            while($ma=mysqli_fetch_array($adminbidang)){
                   if($ma['id_bidang'] == $data_cek['id_bidang']){}else{
          ?> 

          <option value="<?= $ma['id_bidang'];?>"><?= $ma['nama_bidang'];?></option>
        <?php } } ?>
                        </select>
                      </div><?php }?>
                      <div class="form-group">
                        <label>Foto</label>
                        
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <img src="../images/adminbidang/<?= $data_cek['foto'];?>" style="width: 100px; height:100px;">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="<?= $data_cek['foto'];?>">
                          <span class="input-group-append">
                            <button name="foto"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/adminbidang/index&id=Data adminbidang"class="btn btn-light">Cancel</a>
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

  $foto   = $_FILES['foto']['name'];
  $pp = $_POST['password'];
  if (empty($foto) && empty($pp)){
    $koneksi->query("UPDATE adminbidang SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    id_bidang = '$_POST[id_bidang]',
                    tlp    = '$_POST[tlp]'
                    WHERE id_adminbidang = '$_POST[id]'");
}elseif(empty($foto) && !empty($pp)){
    $koneksi->query("UPDATE adminbidang SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    id_bidang = '$_POST[id_bidang]',
                    tlp    = '$_POST[tlp]',
                    password = '$pp'
                    WHERE id_adminbidang = '$_POST[id]'");
    }elseif(!empty($foto) && empty($pp)){


    $hapus= $koneksi->query("select * from adminbidang where id_adminbidang='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="../images/adminbidang/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'../images/adminbidang/'.$foto);
    $koneksi->query("UPDATE adminbidang SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    id_bidang = '$_POST[id_bidang]',
                    tlp    = '$_POST[tlp]',
                    foto  = '$foto'
                    WHERE id_adminbidang= '$_POST[id]'");
  }elseif(!empty($foto) && !empty($pp)){


    $hapus= $koneksi->query("select * from adminbidang where id_adminbidang='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="../images/adminbidang/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'../images/adminbidang/'.$foto);
    $koneksi->query("UPDATE adminbidang SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    tlp    = '$_POST[tlp]',
                    password = '$pp',
                    id_bidang = '$_POST[id_bidang]',
                    foto  = '$foto'
                    WHERE id_adminbidang= '$_POST[id]'");
  }
echo"<script>alert('Selamat Data Berhasil di Edit!!!'); window.location = '?page=page/adminbidang/index&id=Data adminbidang'</script>";
    }



 ?>