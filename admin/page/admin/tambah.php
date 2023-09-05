<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text"  name="nama" class="form-control" id="exampleInputName1" placeholder="Nama" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="exampleInputEmail3" placeholder="No Hp" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username </label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Username" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password"class="form-control" id="exampleInputPassword4" placeholder="Password" required="">
                      </div>
                      
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="Upload Image" required="">
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

    if (isset ($_POST['simpan'])){
        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $nama=addslashes($_POST['nama']);

$no_hp = $_POST['no_hp'];
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);

        $query_simpan =$koneksi->query( "INSERT INTO admin SET 
        nama='$nama',
        username='$username',
        no_hp='$no_hp',
        password='$password',
        foto='$file_name'
        ");
        move_uploaded_file($tmp_name, "../images/adm/".$file_name);

    if ($query_simpan) {
      echo"<script>alert(' Selamat Data Admin Berhasil di tambah !!!'); window.location = '?page=page/admin/index&id=Data Admin'</script>";
      }else{
      echo"<script>alert('Mohon Maaf Data Admin Gagal di Simpan !!!'); window.location = '?page=page/admin/tambah'</script>";
    }}?>