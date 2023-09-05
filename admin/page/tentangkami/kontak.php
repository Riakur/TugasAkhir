  <?php  
        $sql_cek = "SELECT * FROM kontak  WHERE  id_kontak='1'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800">Kontak Kami</h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="simpan" value="<?=$data_cek['id_kontak'];?>">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Judul Web </label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['judul'];?>">
                      </div>
                     <div class="form-group">
                        <label for="exampleInputEmail3">Telepon </label>
                        <input type="text" name="tlp" class="form-control" id="exampleInputEmail3" value="<?= $data_cek['telp'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Whatsapp </label>
                        <div class="input-group col-xs-12">
                         <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">+62</button>
                          </span><input type="text" name="whatsapp" class="form-control" value="<?= $data_cek['whatsapp'];?>">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3"value="<?= $data_cek['email'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Alamat Kami </label>
                        <textarea type="text" name="alamat" class="form-control" id="exampleInputEmail3"><?= $data_cek['alamat'];?></textarea> 
                      </div>
                      
                      <div class="form-group">
                      
                      
                      
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/tentangkami/index&id=Data tentangkami"class="btn btn-light">Cancel</a>
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

  $judul=addslashes($_POST['judul']);
  $alamat=addslashes($_POST['alamat']);
  $whatsapp=addslashes($_POST['whatsapp']);
  $email=addslashes($_POST['email']);
  $maps=addslashes($_POST['maps']);
  $tlp=addslashes($_POST['tlp']);
 
    $koneksi->query("UPDATE kontak SET 
                    judul = '$judul',
                    alamat = '$alamat',
                    whatsapp = '$whatsapp',
                    email = '$email',
                    maps = '$maps',
                    telp = '$tlp'
                    WHERE id_kontak = '1'");


    
echo"<script>alert('Selamat Data Berhasil di Ubah!!!'); window.location = '?page=page/tentangkami/kontak'</script>";
    }



 ?>