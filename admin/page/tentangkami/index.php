  <?php  
        $sql_cek = "SELECT * FROM tentangkami  WHERE  id_tentang='1'";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800">Tentang Kami</h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?=$data_cek['id_tentang'];?>">
                      
                     
                      <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan Tentang Kami </label>
                        <textarea type="text" id="idsas"  name="keterangan" class="form-control" id="exampleInputEmail3"><?= $data_cek['keterangan'];?></textarea> 
                      </div>
                         
  <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'idsas',{height: 200} );
    </script>
                      <div class="form-group">
                      
                      
                      <div class="form-group">
                        <label>Foto</label>
                        
                        <input type="file" name="foto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <img src="../images/tentangkami/<?= $data_cek['foto'];?>" style="width: 100px; height:100px;">
                          <input type="text" name="foto" class="form-control file-upload-info" disabled placeholder="<?= $data_cek['foto'];?>">
                          <span class="input-group-append">
                            <button name="foto"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
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

  $foto   = $_FILES['foto']['name'];
  $keterangan=addslashes($_POST['keterangan']);
  if (empty($foto)){
    $koneksi->query("UPDATE tentangkami SET 
                    keterangan = '$keterangan'
                    WHERE id_tentang = '$_POST[id]'");
}else{


    $hapus= $koneksi->query("select * from tentangkami where id_tentang='$_POST[id]'");
    $tanggal_foto=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_foto['foto'];
    $hapus_foto="../images/tentangkami/$lokasi";
    unlink($hapus_foto);
    move_uploaded_file($_FILES['foto']['tmp_name'],'../images/tentangkami/'.$foto);
    $koneksi->query("UPDATE tentangkami SET 
                    keterangan     = '$keterangan',
                    foto  = '$foto'
                    WHERE id_tentang= '$_POST[id]'");
  }
echo"<script>alert('Selamat Data Berhasil di Ubah!!!'); window.location = '?page=page/tentangkami/index&id=Data tentangkami'</script>";
    }



 ?>