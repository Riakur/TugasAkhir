  <?php  if(isset($_GET['id'])){
        $sql_cek = "SELECT * FROM bidang  WHERE  id_bidang='".$_GET['id']."'";
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

                                <input type="hidden" name="id" value="<?=$data_cek['id_bidang'];?>">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Bidang Pengaduan</label>
                        <input type="text"  name="nama_bidang" class="form-control" id="exampleInputName1" value="<?= $data_cek['nama_bidang'];?>">
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/bidang/index&id=Data Bidang Pengaduan"class="btn btn-light">Cancel</a>
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

 
    $koneksi->query("UPDATE bidang SET 
                    nama_bidang     = '$_POST[nama_bidang]'
                    WHERE id_bidang = '$_POST[id]'");
echo"<script>alert(' Selamat Data Berhasil di Ubah!!!'); window.location = '?page=page/bidang/index&id=Data Bidang Pengaduan'</script>";
    }



 ?>