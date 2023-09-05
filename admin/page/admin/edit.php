  <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM admin  WHERE  id_admin='".$_GET['id']."'";
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

                                <input type="hidden" name="id" value="<?=$data_cek['id_admin'];?>">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text"  name="nama" class="form-control" id="exampleInputName1" value="<?= $data_cek['nama'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['no_hp'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username </label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['username'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password"class="form-control" id="exampleInputPassword4" value="<?= $data_cek['password'];?>">
                      </div>
                      
                      <div class="form-group">
                        <label>Foto</label>
                        
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <img src="../images/adm/<?= $data_cek['foto'];?>" style="width: 100px; height:100px;">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="<?= $data_cek['foto'];?>">
                          <span class="input-group-append">
                            <button name="foto"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/admin/index&id=Data Admin"class="btn btn-light">Cancel</a>
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
    $koneksi->query("UPDATE admin SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]'
                    WHERE id_admin = '$_POST[id]'");
}elseif(empty($foto) && !empty($pp)){
    $koneksi->query("UPDATE admin SET 
                    nama     = '$_POST[nama]',
                    username = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    password = '$pp'
                    WHERE id_admin = '$_POST[id]'");
    }elseif(!empty($foto) && empty($pp)){


    $hapus= $koneksi->query("select * from admin where id_admin='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="../images/adm/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'../images/adm/'.$foto);
    $koneksi->query("UPDATE admin SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    foto  = '$foto'
                    WHERE id_admin= '$_POST[id]'");
  }elseif(!empty($foto) && !empty($pp)){


    $hapus= $koneksi->query("select * from admin where id_admin='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="../images/adm/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'../images/adm/'.$foto);
    $koneksi->query("UPDATE admin SET nama     = '$_POST[nama]',
                    username     = '$_POST[username]',
                    no_hp    = '$_POST[no_hp]',
                    password = '$pp',
                    foto  = '$foto'
                    WHERE id_admin= '$_POST[id]'");
  }
echo"<script>alert(' Selamat Data Admin Berhasil di Edit!!!'); window.location = '?page=page/admin/index&id=Data Admin'</script>";
    }



 ?>