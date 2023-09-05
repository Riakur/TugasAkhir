  <?php  
        $sql_cek = "SELECT * FROM alurpengaduan  WHERE  id_alur='1' ";
        $query_cek = $koneksi->query( $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    
  ?>
  <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800">Alur Pengaduan (PNG/JPG)</h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="id" value="<?=$data_cek['id'];?>">
                                <input type="hidden" name="simpan" value="<?=$data_cek['id'];?>">
                      
                      
                      <div class="form-group">
                        
                        <input type="file" name="file" class="file-upload-default">
                         <img  src="../images/alurpengaduan/<?= $data_cek['file'];?>" style="width: 400px; height:400px;">
                        <div class="input-group col-xs-12">
                         
                          <input type="text" name="file" class="form-control file-upload-info" disabled placeholder="<?= $data_cek['file'];?>">
                          <span class="input-group-append">
                            <button name="file"class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/alurpengaduan/index&data=Data Alur Pengaduan"class="btn btn-light">Cancel</a>
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

  $filel   = $_FILES['file']['name'];
  

    $hapus= $koneksi->query("select * from alurpengaduan where id_alur='1'");
    $tanggal_file=mysqli_fetch_array($hapus,MYSQLI_BOTH);
    $lokasi=$tanggal_file['file'];
    $hapus_file="../images/alurpengaduan/$lokasi";
    unlink($hapus_file);
    move_uploaded_file($_FILES['file']['tmp_name'],'../images/alurpengaduan/'.$filel);
    $koneksi->query("UPDATE alurpengaduan SET 
                    file  = '$filel'
                    WHERE id_alur= '1'");
  
echo"<script>alert('Data Berhasil di Ubah!!!'); window.location = '?page=page/alurpengaduan/index&data=Data alurpengaduan'</script>";
    }



 ?>