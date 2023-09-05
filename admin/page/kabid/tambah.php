<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                        <label for="exampleInputName1">NIP</label>
                        <input type="text"  name="nip" class="form-control" id="exampleInputName1" placeholder="NIP" required="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nama</label>
                        <input type="text"  name="nama" class="form-control" id="exampleInputName1" placeholder="Nama" required="">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputName1">Jabatan</label>
                        <input type="text"  name="jabatan" class="form-control" id="exampleInputName1" placeholder="Nama Jabatan" required="">
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
                      <?php if($_SESSION['level']=='Admin Bidang'){
                $admi=$koneksi->query("SELECT * FROM adminbidang where id_adminbidang='$_SESSION[id]'");
                $mbi=mysqli_fetch_array($admi);?>
                <input type="hidden" name=" id_bidang" value="<?= $mbi['id_bidang'];?>">
                <?php }else{ ?>
                       <div class="form-group">
                        <label for="exampleInputName1">Bidang Pengaduan</label>
                        <select type="text"  name="id_bidang" class="form-control" id="exampleInputName1"  required="">
                          <option value="">Pilih</option>
                                    <?php 
            $no =1;
            $kabid=$koneksi->query("SELECT * FROM bidang  order by id_bidang desc");
            while($m=mysqli_fetch_array($kabid)){
                   
          ?> 
          <option value="<?= $m['id_bidang'];?>"><?= $m['nama_bidang'];?></option>
        <?php } ?>
                        </select>
                      </div>
                      <?php } ?>
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
                      <a href="?page=page/kabid/index&id=Data kabid"class="btn btn-light">Cancel</a>
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
        $id_bidang=addslashes($_POST['id_bidang']);
        $jabatan=addslashes($_POST['jabatan']);
        $nip=addslashes($_POST['nip']);

        $query_simpan =$koneksi->query( "INSERT INTO kabid SET 
        nama='$nama',
        username='$username',
        no_hp='$no_hp',
        jabatan='$jabatan',
        nip='$nip',
        password='$password',
        id_bidang='$id_bidang',
        foto='$file_name'
        ");
        move_uploaded_file($tmp_name, "../images/kabid/".$file_name);

    if ($query_simpan) {
      echo"<script>alert('Selamat Data  Berhasil di tambah !!!'); window.location = '?page=page/kabid/index&id=Data Kepala Bidang Pengaduan'</script>";
      }else{
      echo"<script>alert('Mohon Ma'af Data  Gagal di Simpan !!!'); window.location = '?page=page/kabid/tambah'</script>";
    }}?>