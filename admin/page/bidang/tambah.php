<div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
            
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> <h1 class="h3 mb-2 text-gray-800"><?php echo $_GET['id'];?></h1></h4>
                   
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Bidang Pengaduan</label>
                        <input type="text"  name="nama_bidang" class="form-control" id="exampleInputName1" placeholder="Nama Bidang Pengaduan" required="">
                      </div>
                      
                      <button type="submit" name="simpan" class="btn btn-gradient-primary me-2">Submit</button>
                      <a href="?page=page/bidang/index&id=Data bidang"class="btn btn-light">Cancel</a>
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
        $nama_bidang=addslashes($_POST['nama_bidang']);

        $query_simpan =$koneksi->query( "INSERT INTO bidang SET 
        nama_bidang='$nama_bidang'
        ");
      
    if ($query_simpan) {
      echo"<script>alert('Selamat Data bidang Berhasil di tambah !!!'); window.location = '?page=page/bidang/index&id=Data Bidang Pengaduan'</script>";
      }else{
      echo"<script>alert('Mohon Ma'af Data bidang Gagal di Simpan !!!'); window.location = '?page=page/bidang/tambah'</script>";
    }}?>